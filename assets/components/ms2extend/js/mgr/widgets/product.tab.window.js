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
    formInputs: {
        'id': {xtype: 'hidden'},
        'name': {xtype: 'textfield', fieldLabel: _('ms2extend.field.name'), anchor: '100%'},
        'is_active': {xtype: 'combo-boolean', fieldLabel: _('ms2extend.field.active'), anchor: '100%'},
        'type': {xtype: 'ms2extend-combo-select-type', fieldLabel: _('ms2extend.field.tab.type'), anchor: '100%'},
        'fields': {xtype: 'ms2extend-combo-multiselect-fields', fieldLabel: _('ms2extend.field.tab.fields'), anchor: '100%'}
    },

    defaultValues: {
        type: '',
        is_active: 1
    },

    renderForm: function () {
        ms2Extend.window.productTab.superclass.renderForm.call(this);
        this.setValues({fields: this.record.fields_array});
    }
});
Ext.reg('ms2extend-window-product-tab', ms2Extend.window.productTab);