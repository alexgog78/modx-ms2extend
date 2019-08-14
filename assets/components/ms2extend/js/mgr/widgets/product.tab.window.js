ms2Extend.window.productTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-window-product-tab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl
    });
    ms2Extend.window.productTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.window.productTab, ms2Extend.window.abstract, {
    formFields: [
        {xtype: 'hidden', name: 'id'},
        {xtype: 'textfield', name: 'name', fieldLabel: _('ms2extend.field.name'), anchor: '100%'},
        {xtype: 'combo-boolean', name: 'is_active', fieldLabel: _('ms2extend.field.active'), anchor: '100%'},
        {xtype: 'ms2extend-combo-select-type', name: 'type', fieldLabel: _('ms2extend.field.tab.type'), anchor: '100%'},
        {xtype: 'ms2extend-combo-multiselect-fields', name: 'fields', fieldLabel: _('ms2extend.field.tab.fields'), anchor: '100%'}
    ],

    defaultValues: {
        type: '',
        is_active: 1
    },

    setRecord: function (record) {
        ms2Extend.window.productTab.superclass.setRecord.call(this, record);
        this.setValues({fields: record.fields_array});
    }
});
Ext.reg('ms2extend-window-product-tab', ms2Extend.window.productTab);