'use strict';

ms2Extend.window.categorytab = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
    });
    ms2Extend.window.categorytab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.window.categorytab, ms2Extend.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id'},
            this.getFormInput('name', {fieldLabel: _('ms2extend_tab_name')}),
            this.getFormInput('xtypes', {xtype: 'ms2extend-combo-multiselect-xtype', fieldLabel: _('ms2extend_tab_xtypes')}),
            this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('ms2extend_tab_active')}),
            this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('ms2extend_tab_description')}),
        ];
    },
});
Ext.reg('ms2extend-window-categorytab', ms2Extend.window.categorytab);
