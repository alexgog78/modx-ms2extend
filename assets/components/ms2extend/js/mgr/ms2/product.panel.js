'use strict';

Ext.namespace('ms2Extend.extend');

Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function () {
    this.on('beforerender', function () {
        var resourcePanel = Ext.getCmp('modx-panel-resource');
        var productFields = resourcePanel.getAllProductFields(resourcePanel);
        var activeFields = resourcePanel.active_fields;
        new ms2Extend.extend.product({
            panel: this,
            recordId: ms2Extend.config.recordId,
            tabsData: ms2Extend.config.tabs,
            resourcePanel: resourcePanel,
            productFields: productFields,
            activeFields: activeFields
        });
    });
});

ms2Extend.extend.product = function (config) {
    config = config || {};
    ms2Extend.extend.product.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.extend.product, Ext.Component, {
    panel: {},
    recordId: null,
    tabsData: [],
    resourcePanel: {},
    productFields: {},
    activeFields: [],
    tabs: [],

    initComponent: function() {
        this.getTabs();
        this.updatePanel();
    },

    getTabs: function () {
        Ext.each(this.tabsData, function(tab) {
            var description = ms2Extend.function.getPanelDescription(tab.description);
            var fields = this.renderFields(tab.fields);
            var xtypes = this.renderXtypes(tab.xtypes);
            if (!fields.length && !xtypes.length) {
                return true;
            }
            this.tabs.push({
                title: tab.name,
                items: [
                    description,
                    {
                        layout: 'form',
                        labelAlign: 'top',
                        //bodyCssClass: 'main-wrapper',
                        items: fields,
                    },
                    xtypes,
                ]
            });
        }, this);
    },

    renderFields: function (fields) {
        var form = [];
        Ext.each(fields, function(field) {
            if (!field) {
                return true;
            }
            var fieldConfig = this.productFields[field];
            if (!fieldConfig || this.activeFields.indexOf(field) !== -1) {
                return true;
            }
            this.activeFields.push(field);
            var fieldXtype = miniShop2.utils.getExtField(this.resourcePanel, field, fieldConfig);

            Ext.apply(fieldXtype, {
                anchor: '33%'
            });
            form.push(fieldXtype);
        }, this);
        return form;
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
        console.log(this.tabsData);
        console.log(this.tabs);
        if (!this.tabs.length) {
            return;
        }
        this.panel.add({
            title: _('ms2extend.tab.additional_properties'),
            items: ms2Extend.function.getVerticalTabs(this.tabs)
        });
    }
});
