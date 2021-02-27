'use strict';

Ext.namespace('ms2Extend.extend.panel');

Ext.ComponentMgr.onAvailable('modx-resource-tabs', function () {
    this.on('beforerender', function () {
        if (!ms2Extend.config.tabs.length) {
            return;
        }
        this.add({
            title: _('ms2extend_additional_properties'),
            xtype: 'ms2extend-extend-panel-category',
            tabsData: ms2Extend.config.tabs,
            record_id: ms2Extend.config.record_id,
        });
    });
});

ms2Extend.extend.panel.category = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-extend-panel-category';
    }
    Ext.applyIf(config, {});
    ms2Extend.extend.panel.category.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.extend.panel.category, MODx.Panel, {
    tabsData: [],
    record_id: null,

    initComponent: function () {
        this.items = ms2Extend.component.verticalTabs(this.getTabs());
        ms2Extend.extend.panel.category.superclass.initComponent.call(this);
    },

    getTabs: function () {
        let tabs = [];
        Ext.each(this.tabsData, function (tab) {
            tabs.push({
                title: tab.name,
                items: [
                    this.getDescription(tab.description),
                    this.getXtypes(tab.xtypes),
                ]
            });
        }, this);
        return tabs;
    },

    getDescription: function (html = null) {
        return html ? [
            ms2Extend.component.panelDescription(html),
            MODx.PanelSpacer
        ] : {};
    },

    getXtypes: function (xtypesData) {
        let xtypes = [];
        Ext.each(xtypesData, function (xtype) {
            let html = {
                xtype: xtype,
                resource_id: this.record_id,
            };
            if (!this.record_id) {
                html = ms2Extend.component.notice(_('ms2extend_undefined'));
            }
            xtypes.push(html);
        }, this);
        return xtypes;
    },
});
Ext.reg('ms2extend-extend-panel-category', ms2Extend.extend.panel.category);
