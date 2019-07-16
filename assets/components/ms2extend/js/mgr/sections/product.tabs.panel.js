Ext.onReady(function () {
    MODx.load({
        xtype: 'ms2ext-page-product-tabs'
    });
});


ms2Extend.page.productTabs = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'ms2ext-panel-product-tabs',
            renderTo: 'ms2ext-panel-product-tabs-div'
        }]
    });
    ms2Extend.page.productTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.page.productTabs, MODx.Component);
Ext.reg('ms2ext-page-product-tabs', ms2Extend.page.productTabs);


ms2Extend.panel.productTabs = function (config) {
    config = config || {};
    Ext.apply(config, {
        border: false,
        baseCls: 'modx-formpanel',
        cls: 'container',
        items: [{
            html: '<h2>' + _('ms2ext.section.product-tabs') + '</h2>',
            border: false,
            cls: 'modx-page-header'
        }, {
            xtype: 'modx-tabs',
            defaults: {
                border: false,
                autoHeight: true
            },
            border: true,

            items: [{
                title: _('ms2ext.tab.product-tabs'),
                defaults: {autoHeight: true},
                items: [{
                    html: '<p>' + _('ms2ext.tab.product-tabs.management') + '</p>',
                    border: false,
                    bodyCssClass: 'panel-desc'
                }, {
                    xtype: 'ms2ext-grid-product-tabs',
                    cls: 'main-wrapper',
                    preventRender: true
                }]
            }]
        }]
    });
    ms2Extend.panel.productTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.productTabs, MODx.Panel);
Ext.reg('ms2ext-panel-product-tabs', ms2Extend.panel.productTabs);