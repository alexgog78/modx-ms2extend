'use strict';

ms2Extend.grid.categorytab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-categorytab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/categorytab/getlist',
        },
        save_action: 'mgr/categorytab/updatefromgrid',
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
                xtype: 'ms2extend-window-categorytab',
                action: 'mgr/categorytab/create',
            },
            quickUpdate: {
                xtype: 'ms2extend-window-categorytab',
                action: 'mgr/categorytab/update',
            },
            remove: {
                action: 'mgr/categorytab/remove'
            }
        },
    });
    ms2Extend.grid.categorytab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.categorytab, ms2Extend.grid.abstract, {});
Ext.reg('ms2extend-grid-categorytab', ms2Extend.grid.categorytab);
