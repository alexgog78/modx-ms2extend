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
        save_action: 'mgr/producttabs/updatefromgrid',
        fields: [
            'id',
            'name',
            'fields'
        ],
        columns: [
            {header: _('id'), dataIndex: 'id', sortable: true, width: 0.05},
            {header: _('ms2extend.field.name'), dataIndex: 'name', sortable: true, width: 0.2, editor: {xtype: 'textfield'}},
            {header: _('ms2extend.field.tab.fields'), dataIndex: 'fields', sortable: true, width: 0.75, editor: {xtype: 'textarea'}}
        ],

        //Toolbar
        tbar: [
            //Search panel
            {
                xtype: 'textfield',
                id: 'ms2extend-product-tabs-search-filter',
                emptyText: _('ms2extend.controls.search'),
                listeners: {
                    'change': {fn: ms2Extend.function.search, scope: this},
                    'render': {
                        fn: function (cmp) {
                            new Ext.KeyMap(cmp.getEl(), {
                                key: Ext.EventObject.ENTER,
                                fn: function () {
                                    this.fireEvent('change', this);
                                    this.blur();
                                    return true;
                                },
                                scope: cmp
                            });
                        }, scope: this
                    }
                }
            },
            //Create button
            {
                text: _('ms2extend.controls.create'),
                cls: 'primary-button',
                scope: this,
                handler: ms2Extend.function.createRecord,
                baseParams: {
                    action: 'mgr/producttabs/create',
                    fields: this.getFields(),
                    defaults: {
                        active: true
                    }
                }
            }
        ]
    });
    ms2Extend.grid.productTabs.superclass.constructor.call(this, config)
};
Ext.extend(ms2Extend.grid.productTabs, ms2Extend.grid.abstract, {
    //Context menu function
    getMenu: function () {
        return [{
            text: _('ms2extend.controls.update'),
            handler: ms2Extend.function.updateRecord,
            baseParams: {
                action: 'mgr/producttabs/update',
                fields: this.getFields('update')
            }
        }, '-', {
            text: _('ms2extend.controls.remove'),
            handler: ms2Extend.function.removeRecord,
            baseParams: {
                action: 'mgr/producttabs/remove'
            }
        }];
    },

    //Form fields function
    getFields: function (action) {
        var fields = [];
        fields.push(
            {xtype: 'hidden', name: 'id'},
            {xtype: 'textfield', name: 'name', fieldLabel: _('ms2extend.field.name'), anchor: '100%'},
            {xtype: 'textarea', name: 'fields', fieldLabel: _('ms2extend.field.tab.fields'), anchor: '100%'}
        );
        return fields;
    }
});
Ext.reg('ms2extend-grid-product-tabs', ms2Extend.grid.productTabs);