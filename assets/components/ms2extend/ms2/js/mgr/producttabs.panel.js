'use strict';

//TODO refactor
ms2Extend.productPage = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        productTabs: []
    });
    ms2Extend.productPage.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.productPage, MODx.Panel, {
    //buttons: {}

    /*renderButtons: function () {

    }*/

    tab: [],
    tabPanel: [],

    initComponent: function() {
        //console.log(this);

        Ext.each(this.productTabs, function(tab) {
            //console.log(tab);

            //var fields = Ext.decode(tab.fields, true);
            //var xtypes = Ext.decode(tab.xtypes, true);
            this.tab = [];

            var fields = this.renderFields(tab.fields);
            var xtypes = this.renderXtypes(tab.xtypes);

            if (!this.tab.length) {
                //return true;
            }

            this.tabPanel.push({
                id: tab.id,
                title: tab.name,
                items: [
                    {
                        layout: 'form',
                        labelAlign: 'top',
                        bodyCssClass: 'main-wrapper',
                        items: fields,
                    },
                    //fields,
                    xtypes
                ]
            });
        }, this);

        if (this.tabPanel.length) {
            this.title = _('ms2extend.tab.product_options');
            this.items = [{
                xtype: 'modx-vtabs',
                autoTabs: true,
                border: false,
                plain: true,
                deferredRender: false,
                id: this.id + '-vtabs',
                items: this.tabPanel,
            }]
        }
        ms2Extend.productPage.superclass.initComponent.call(this);
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

            //console.log(field);
        }, this);
        return form;
    },

    renderXtypes: function (xtypes) {
        var form = [];
        Ext.each(xtypes, function(xtype) {
            if (!xtype) {
                return true;
            }
            //console.log(this.recordId);
            form.push({
                layout: 'form',
                labelAlign: 'top',
                bodyCssClass: 'main-wrapper',
                //cls: 'container',

                xtype: xtype,
                recordId: this.recordId
            });
        }, this);
        return form;
    }
});
Ext.reg('ms2extend-productpage', ms2Extend.productPage);
