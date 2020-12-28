'use strict';

ms2Extend.grid.producttab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-producttab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/producttab/getlist',
        },
        save_action: 'mgr/producttab/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'fields',
            'fields_combo',
            'xtypes',
            'xtypes_combo',
            'menuindex',
            'is_active',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('ms2extend_tab_name'), width: 0.2, editor: {xtype: 'textfield'}}),
            this.getGridColumn('fields', {header: _('ms2extend_tab_fields'), width: 0.3}),
            this.getGridColumn('xtypes', {header: _('ms2extend_tab_xtypes'), width: 0.3}),
            this.getGridColumn('is_active', {header: _('ms2extend_tab_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: ms2Extend.renderer.boolean}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'ms2extend-window-producttab',
                action: 'mgr/producttab/create',
            },
            quickUpdate: {
                xtype: 'ms2extend-window-producttab',
                action: 'mgr/producttab/update',
            },
            remove: {
                action: 'mgr/producttab/remove'
            },
        },
    });
    ms2Extend.grid.producttab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.producttab, ms2Extend.grid.abstract, {});
Ext.reg('ms2extend-grid-producttab', ms2Extend.grid.producttab);
