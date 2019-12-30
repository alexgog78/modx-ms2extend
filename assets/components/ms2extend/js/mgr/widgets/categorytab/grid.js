'use strict';

ms2Extend.grid.categoryTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-categorytab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/categorytab/getlist'
        },
        save_action: 'mgr/categorytab/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'xtypes',
            'xtypes_combo',
            'is_active',
        ],
        gridColumns: {
            'id': {header: _('id'), width: 0.05},
            'name': {header: _('ms2extend.field.name'), width: 0.2, editor: {xtype: 'textfield'}},
            'description': {header: _('ms2extend.field.description'), width: 0.2, editor: {xtype: 'textfield'}},
            'xtypes': {header: _('ms2extend.field.xtypes'), width: 0.5},
            'is_active': {header: _('ms2extend.field.active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: ms2Extend.renderer.boolean}
        },
        recordActions: {
            xtype: 'ms2extend-window-categorytab',
            action: {
                create: 'mgr/categorytab/create',
                update: 'mgr/categorytab/update',
                remove: 'mgr/categorytab/remove'
            }
        }
    });
    ms2Extend.grid.categoryTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.categoryTab, ms2Extend.grid.abstract, {

});
Ext.reg('ms2extend-grid-categorytab', ms2Extend.grid.categoryTab);
