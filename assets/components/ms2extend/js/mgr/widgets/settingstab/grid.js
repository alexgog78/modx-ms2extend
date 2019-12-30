'use strict';

ms2Extend.grid.settingsTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-settingstab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/settingstab/getlist'
        },
        save_action: 'mgr/settingstab/updatefromgrid',
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
            xtype: 'ms2extend-window-settingstab',
            action: {
                create: 'mgr/settingstab/create',
                update: 'mgr/settingstab/update',
                remove: 'mgr/settingstab/remove'
            }
        }
    });
    ms2Extend.grid.settingsTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.settingsTab, ms2Extend.grid.abstract, {

});
Ext.reg('ms2extend-grid-settingstab', ms2Extend.grid.settingsTab);
