'use strict';

ms2Extend.window.categoryTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-window-categorytab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl
    });
    ms2Extend.window.categoryTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.window.categoryTab, ms2Extend.window.abstract, {
    formInputs: {
        'id': {xtype: 'hidden'},
        'name': {xtype: 'textfield', fieldLabel: _('ms2extend.field.name')},
        'xtypes': {xtype: 'ms2extend-combo-multiselect-xtype', fieldLabel: _('ms2extend.field.xtypes')},
        'is_active': {xtype: 'combo-boolean', fieldLabel: _('ms2extend.field.active')},
        'description': {xtype: 'textarea', fieldLabel: _('ms2extend.field.description')}
    },

    defaultValues: {
        is_active: 1
    },
});
Ext.reg('ms2extend-window-categorytab', ms2Extend.window.categoryTab);
