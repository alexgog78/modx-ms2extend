'use strict';

Ext.namespace('ms2Extend.extend');

Ext.ComponentMgr.onAvailable('minishop2-settings-tabs', function () {
    this.on('beforerender', function () {
        new ms2Extend.extend.settings({
            panel: this,
            tabsData: ms2Extend.config.tabs
        });
    });
});

ms2Extend.extend.settings = function (config) {
    config = config || {};
    ms2Extend.extend.settings.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.extend.settings, Ext.Component, {
    panel: {},
    tabsData: [],
    tabs: [],

    initComponent: function () {
        this.getTabs();
        this.updatePanel();
    },

    getTabs: function () {
        Ext.each(this.tabsData, function (tab) {
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
        Ext.each(xtypes, function (xtype) {
            if (!xtype) {
                return true;
            }
            panel.push({
                xtype: xtype,
                cls: 'main-wrapper'
            });
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
