Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-product-tabs'
    });
});
ms2Extend.panel.productTabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-product-tabs';
    }
    Ext.apply(config, {});
    ms2Extend.panel.productTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.productTabs, ms2Extend.panel.abstract, {
    pageHeader: _('ms2extend.section.product-tabs'),

    panelTabs: [{
        title: _('ms2extend.tab.product-tabs'),
        description: _('ms2extend.tab.product-tabs.management'),
        xtype: 'ms2extend-grid-product-tabs',
    }]
});
Ext.reg('ms2extend-panel-product-tabs', ms2Extend.panel.productTabs);