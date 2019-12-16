'use strict';

ms2Extend.grid.productTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-producttab';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/producttab/getlist'
        },
        save_action: 'mgr/producttab/updatefromgrid',
        fields: [
            'id',
            'name',
            'fields',
            'fields_combo',
            'xtypes',
            'xtypes_combo',
            'is_active',
        ],
        gridColumns: {
            'id': {header: _('id'), width: 0.05},
            'name': {header: _('ms2extend.field.name'), width: 0.2, editor: {xtype: 'textfield'}},
            'fields': {header: _('ms2extend.field.product_tab.fields'), width: 0.3},
            'xtypes': {header: _('ms2extend.field.product_tab.xtypes'), width: 0.3},
            'is_active': {header: _('ms2extend.field.active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: ms2Extend.renderer.boolean}
        },
        recordActions: {
            xtype: 'ms2extend-window-producttab',
            action: {
                create: 'mgr/producttab/create',
                update: 'mgr/producttab/update',
                remove: 'mgr/producttab/remove'
            }
        }
    });
    ms2Extend.grid.productTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.productTab, ms2Extend.grid.abstract, {

});
Ext.reg('ms2extend-grid-producttab', ms2Extend.grid.productTab);
