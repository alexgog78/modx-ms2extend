'use strict';

Ext.namespace('ms2Extend.extend.panel');

Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function () {
    this.on('beforerender', function () {
        if (!ms2Extend.config.tabs.length) {
            return;
        }
        let panel = Ext.getCmp('modx-panel-resource');
        let productFields = panel.getAllProductFields(panel);
        let activeFields = panel.active_fields;
        this.add({
            title: _('ms2extend_additional_properties'),
            xtype: 'ms2extend-extend-panel-product',
            tabsData: ms2Extend.config.tabs,
            record_id: ms2Extend.config.record_id,
            panel: panel,
            productFields: productFields,
            activeFields: activeFields,
        });
    });
});

ms2Extend.extend.panel.product = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-extend-panel-product';
    }
    Ext.applyIf(config, {});
    ms2Extend.extend.panel.product.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.extend.panel.product, MODx.Panel, {
    tabsData: [],
    record_id: null,
    panel: {},
    productFields: {},
    activeFields: [],

    initComponent: function () {
        this.items = {
            xtype: 'modx-vtabs',
            deferredRender: false,
            anchor: '100%',
            items: this.getTabs(),
        };
        ms2Extend.extend.panel.product.superclass.initComponent.call(this);
    },

    getTabs: function () {
        let tabs = [];
        Ext.each(this.tabsData, function (tab) {
            let description = this.getDescription(tab.description);
            let fields = this.getFields(tab.fields);
            let xtypes = this.getXtypes(tab.xtypes);
            tabs.push({
                title: tab.name,
                items: [
                    description,
                    {
                        layout: 'form',
                        labelAlign: 'top',
                        items: fields,
                    },
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

    getFields: function (fieldsData) {
        var fields = [];
        Ext.each(fieldsData, function (field) {
            var fieldConfig = this.productFields[field];
            if (!fieldConfig || this.activeFields.indexOf(field) !== -1) {
                return true;
            }
            this.activeFields.push(field);
            var fieldXtype = miniShop2.utils.getExtField(this.panel, field, fieldConfig);

            Ext.apply(fieldXtype, {
                anchor: '33%'
            });
            fields.push(fieldXtype);
        }, this);
        return fields;
    },

    getXtypes: function (xtypesData) {
        var xtypes = [];
        Ext.each(xtypesData, function (xtype) {
            var html = {
                xtype: xtype,
                resource_id: this.record_id,
                cls: 'main-wrapper'
            };
            if (!this.record_id) {
                html = {
                    html: _('ms2extend_undefined'),
                    cls: 'panel-desc',
                    style: {
                        fontSize: '170%',
                        textAlign: 'center'
                    }
                };
            }
            xtypes.push(html);
        }, this);
        return xtypes;
    },
});
Ext.reg('ms2extend-extend-panel-product', ms2Extend.extend.panel.product);
