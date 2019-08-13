ms2Extend.grid.productTabs = function (config) {
    config = config || {};
    config.lexicon_namespace = ms2Extend.lexicon_namespace;
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
    gridFields: [
        'id',
        'name',
        'type',
        'fields',
        'active'
    ],

    gridColumns: [
        {header: _('id'), dataIndex: 'id', sortable: true, width: 0.05},
        {header: _('ms2extend.field.name'), dataIndex: 'name', sortable: true, width: 0.2, editor: {xtype: 'textfield'}},
        {header: _('ms2extend.field.tab.type'), dataIndex: 'type', sortable: true, width: 0.1},
        {header: _('ms2extend.field.tab.fields'), dataIndex: 'fields', sortable: true, width: 0.6, editor: {xtype: 'textarea'}},
        {header: _('ms2extend.field.active'), dataIndex: 'active', sortable: true, width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}}
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