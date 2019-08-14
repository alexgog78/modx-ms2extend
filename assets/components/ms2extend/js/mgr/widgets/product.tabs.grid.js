ms2Extend.grid.productTabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-grid-product-tabs';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/producttabs/getlist'
        },
        save_action: 'mgr/producttabs/updatefromgrid'
    });
    ms2Extend.grid.productTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.productTabs, ms2Extend.grid.abstract, {
    lexicons: {
        search: _('ms2extend.controls.search'),
        search_clear: _('ms2extend.controls.search_clear'),
        create: _('ms2extend.controls.create'),
        update: _('ms2extend.controls.update'),
        remove: _('ms2extend.controls.remove'),
        remove_confirm: _('ms2extend.controls.remove_confirm')
    },

    gridFields: [
        'id',
        'name',
        'type',
        'fields',
        'fields_array',
        'is_active'
    ],

    gridColumns: [
        {header: _('id'), dataIndex: 'id', sortable: true, width: 0.05},
        {header: _('ms2extend.field.name'), dataIndex: 'name', sortable: true, width: 0.2, editor: {xtype: 'textfield'}},
        {header: _('ms2extend.field.tab.type'), dataIndex: 'type', sortable: true, width: 0.1, editor: {xtype: 'ms2extend-combo-select-type'}},
        {header: _('ms2extend.field.tab.fields'), dataIndex: 'fields_array', sortable: true, width: 0.6,  renderer: ms2Extend.renderer.tabFields},
        {header: _('ms2extend.field.active'), dataIndex: 'is_active', sortable: true, width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}}
    ],

    createRecordForm: {
        xtype: 'ms2extend-window-product-tab',
        baseParams: {
            action: 'mgr/producttabs/create'
        }
    },

    updateRecordForm: {
        xtype: 'ms2extend-window-product-tab',
        baseParams: {
            action: 'mgr/producttabs/update'
        }
    },

    removeRecordForm: {
        baseParams: {
            action: 'mgr/producttabs/remove'
        }
    }
});
Ext.reg('ms2extend-grid-product-tabs', ms2Extend.grid.productTabs);