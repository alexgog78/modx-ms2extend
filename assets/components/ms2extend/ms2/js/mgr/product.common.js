'use strict';

Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function () {
    this.on('beforerender', function () {
        var panel = this;
        var resourcePanel = Ext.getCmp('modx-panel-resource');
        var productFields = resourcePanel.getAllProductFields(resourcePanel);
        var activeFields = resourcePanel.active_fields;

        panel.add({
            xtype: 'ms2extend-productpage',
            resourcePanel: resourcePanel,
            productFields: productFields,
            activeFields: activeFields,
            productTabs: ms2Extend.config.productTabs,
            recordId: ms2Extend.config.recordId,
            //productTabs: [],
        });
    });
});
