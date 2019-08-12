ms2Extend.window.productTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-window-product-tab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
    });
    ms2Extend.window.productTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.window.productTab, ms2Extend.window.abstract, {
    formFields: [
        {xtype: 'hidden', name: 'id'},
        {xtype: 'textfield', name: 'name', fieldLabel: _('ms2extend.field.name'), anchor: '100%'},
        {xtype: 'textarea', name: 'fields', fieldLabel: _('ms2extend.field.tab_fields'), anchor: '100%'}
    ],

    defaultValues: {}
});
Ext.reg('ms2extend-window-product-tab', ms2Extend.window.productTab);