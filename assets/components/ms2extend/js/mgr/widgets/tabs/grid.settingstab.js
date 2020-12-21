'use strict';

ms2Extend.grid.settingstab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-settingstab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/settingstab/getlist',
        },
        save_action: 'mgr/settingstab/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'xtypes',
            'xtypes_combo',
            'menuindex',
            'is_active',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('ms2extend_tab_name'), width: 0.2, editor: {xtype: 'textfield'}}),
            this.getGridColumn('xtypes', {header: _('ms2extend_tab_xtypes'), width: 0.3}),
            this.getGridColumn('is_active', {header: _('ms2extend_tab_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: ms2Extend.renderer.boolean}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'ms2extend-window-settingstab',
                action: 'mgr/settingstab/create',
            },
            quickUpdate: {
                xtype: 'ms2extend-window-settingstab',
                action: 'mgr/settingstab/update',
            },
            remove: {
                action: 'mgr/settingstab/remove'
            }
        },
    });
    ms2Extend.grid.settingstab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.settingstab, ms2Extend.grid.abstract, {});
Ext.reg('ms2extend-grid-settingstab', ms2Extend.grid.settingstab);
