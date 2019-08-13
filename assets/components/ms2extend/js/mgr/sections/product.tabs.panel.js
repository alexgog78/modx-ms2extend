Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-product-tabs'
    });
});
ms2Extend.panel.groups = function (config) {
    config = config || {};
    Ext.apply(config, {
        //border: false,
        //baseCls: 'modx-formpanel',
        cls: 'container',
        items: [{
            html: '<h2>' + _('ms2extend.section.product-tabs') + '</h2>',
            //border: false,
            cls: 'modx-page-header'
        }, {
            xtype: 'modx-tabs',
            /*defaults: {
                border: false,
                autoHeight: true
            },*/
            //border: true,
            stateful: true,
            stateId: 'jpayments-panel-payments-vtabs',
            stateEvents: ['tabchange'],
            getState: function () {
                return {
                    activeTab:this.items.indexOf(this.getActiveTab())
                };
             },
            items: [{
                title: _('ms2extend.tab.product-tabs'),
                //defaults: {autoHeight: true},
                layout: 'anchor',
                items: [{
                    html: '<p>' + _('ms2extend.tab.product-tabs.management') + '</p>',
                    //border: false,
                    bodyCssClass: 'panel-desc'
                }, {
                    xtype: 'ms2extend-grid-product-tabs',
                    cls: 'main-wrapper',
                    //preventRender: true
                }]
            }]
        }]
    });
    ms2Extend.panel.groups.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.groups, MODx.Panel);
Ext.reg('ms2extend-panel-product-tabs', ms2Extend.panel.groups);