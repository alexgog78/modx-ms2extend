'use strict';

Ext.namespace('ms2Extend.extend.panel');

Ext.ComponentMgr.onAvailable('minishop2-settings-tabs', function () {
    this.on('beforerender', function () {
        if (!ms2Extend.config.tabs.length) {
            return;
        }
        this.add({
            title: _('ms2extend_additional_properties'),
            xtype: 'ms2extend-extend-panel-settings',
            tabsData: ms2Extend.config.tabs,
        });
    });
});

ms2Extend.extend.panel.settings = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-extend-panel-settings';
    }
    Ext.applyIf(config, {});
    ms2Extend.extend.panel.settings.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.extend.panel.settings, MODx.Panel, {
    tabsData: [],

    initComponent: function () {
        this.items = ms2Extend.component.verticalTabs(this.getTabs());
        ms2Extend.extend.panel.settings.superclass.initComponent.call(this);
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
            xtypes.push({
                xtype: xtype,
            });
        }, this);
        return xtypes;
    },
});
Ext.reg('ms2extend-extend-panel-settings', ms2Extend.extend.panel.settings);
