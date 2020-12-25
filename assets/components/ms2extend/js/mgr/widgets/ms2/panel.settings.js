'use strict';

Ext.namespace('ms2Extend.extend.panel');

Ext.ComponentMgr.onAvailable('minishop2-settings-tabs', function () {
    this.on('beforerender', function () {
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
        this.items = {
            xtype: 'modx-vtabs',
            deferredRender: false,
            anchor: '100%',
            items: this.getTabs(),
        };
        ms2Extend.extend.panel.settings.superclass.initComponent.call(this);
    },

    getTabs: function () {
        let tabs = [];
        Ext.each(this.tabsData, function (tab) {
            let description = this.getDescription(tab.description);
            let xtypes = this.getXtypes(tab.xtypes);
            if (!xtypes.length) {
                return true;
            }
            tabs.push({
                title: tab.name,
                items: [
                    description,
                    xtypes,
                ]
            });
        }, this);
        return tabs;
    },

    getDescription: function (html = null) {
        return html ? [{
            xtype: 'modx-description',
            itemId: '',
            html: '<p>' + html + '</p>'
        }, MODx.PanelSpacer] : {};
    },

    getXtypes: function (xtypesData) {
        var xtypes = [];
        Ext.each(xtypesData, function (xtype) {
            if (!xtype) {
                return true;
            }
            var html = {
                xtype: xtype,
                record_id: this.record_id,
                cls: 'main-wrapper'
            };
            html = {
                html: _('ms2extend_indevelopment'),
                cls: 'panel-desc',
                style: {
                    fontSize: '170%',
                    textAlign: 'center'
                }
            };
            xtypes.push(html);
        }, this);
        return xtypes;
    },
});
Ext.reg('ms2extend-extend-panel-settings', ms2Extend.extend.panel.settings);
