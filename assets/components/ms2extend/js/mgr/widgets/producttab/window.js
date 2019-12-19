'use strict';

ms2Extend.window.productTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-window-producttab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl
    });
    ms2Extend.window.productTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.window.productTab, ms2Extend.window.abstract, {
    formInputs: {
        'id': {xtype: 'hidden'},
        'name': {xtype: 'textfield', fieldLabel: _('ms2extend.field.name')},
        'fields': {xtype: 'ms2extend-combo-multiselect-field', fieldLabel: _('ms2extend.field.product_tab.fields')},
        'xtypes': {xtype: 'ms2extend-combo-multiselect-xtype', fieldLabel: _('ms2extend.field.product_tab.xtypes')},
        'is_active': {xtype: 'combo-boolean', fieldLabel: _('ms2extend.field.active')}
    },

    defaultValues: {
        is_active: 1
    },
});
Ext.reg('ms2extend-window-producttab', ms2Extend.window.productTab);
