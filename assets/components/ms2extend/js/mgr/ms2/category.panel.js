'use strict';

Ext.namespace('ms2Extend.extend');

Ext.ComponentMgr.onAvailable('modx-resource-tabs', function () {
    this.on('beforerender', function () {
        new ms2Extend.extend.category({
            panel: this,
            recordId: ms2Extend.config.recordId,
            tabsData: ms2Extend.config.tabs
        });
    });
});

ms2Extend.extend.category = function (config) {
    config = config || {};
    ms2Extend.extend.category.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.extend.category, Ext.Component, {
    panel: {},
    recordId: null,
    tabsData: [],
    tabs: [],

    initComponent: function() {
        this.getTabs();
        this.updatePanel();
    },

    getTabs: function () {
        Ext.each(this.tabsData, function(tab) {
            var description = ms2Extend.function.getPanelDescription(tab.description);
            var xtypes = this.renderXtypes(tab.xtypes);
            if (!xtypes.length) {
                return true;
            }
            this.tabs.push({
                title: tab.name,
                items: [
                    description,
                    xtypes,
                ]
            });
        }, this);
    },

    renderXtypes: function (xtypes) {
        var panel = [];
        Ext.each(xtypes, function(xtype) {
            if (!xtype) {
                return true;
            }
            var html = {
                xtype: xtype,
                recordId: this.recordId,
                cls: 'main-wrapper'
            };
            if (!this.recordId) {
                html = {xtype: 'ms2extend-notice-undefined'};
            }
            panel.push(html);
        }, this);
        return panel;
    },

    updatePanel: function () {
        if (!this.tabs.length) {
            return;
        }
        this.panel.add({
            title: _('ms2extend.tab.additional_properties'),
            items: ms2Extend.function.getVerticalTabs(this.tabs)
        });
    }
});
