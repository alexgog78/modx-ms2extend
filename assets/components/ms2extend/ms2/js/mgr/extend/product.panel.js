'use strict';

Ext.namespace('ms2Extend.extend.product');

Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function () {
    this.on('beforerender', function () {
        ms2Extend.extend.product.initComponent(this);
    });
});

ms2Extend.extend.product = {
    recordId: ms2Extend.config.recordId,
    tabs: ms2Extend.config.productTabs,

    initComponent: function(panel) {
        Ext.each(this.tabs, function(tab) {
            console.log(tab);
            /*var description = ms2Extend.function.getPanelDescription(tab.description);
            var xtypes = this.renderXtypes(tab.xtypes);
            panel.add({
                title: tab.name,
                layout: 'anchor',
                items: [
                    description,
                    xtypes,
                ]
            });*/
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
