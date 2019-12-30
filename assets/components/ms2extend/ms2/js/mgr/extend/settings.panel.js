'use strict';

Ext.namespace('ms2Extend.extend.settings');

Ext.ComponentMgr.onAvailable('minishop2-settings-tabs', function () {
    this.on('beforerender', function () {
        ms2Extend.extend.settings.initComponent(this);
    });
});

ms2Extend.extend.settings = {
    tabs: ms2Extend.config.settingsTabs,

    initComponent: function(panel) {
        Ext.each(this.tabs, function(tab) {
            var description = ms2Extend.function.getPanelDescription(tab.description);
            var xtypes = this.renderXtypes(tab.xtypes);
            panel.add({
                title: tab.name,
                layout: 'anchor',
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
            panel.push({
                xtype: xtype,
                cls: 'main-wrapper'
            });
        }, this);
        return panel;
    }
};


