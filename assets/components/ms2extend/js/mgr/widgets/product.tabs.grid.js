ms2Extend.grid.productTabs = function (config) {
    config = config || {};
    //config.namespace = ms2Extend.namespace;
    if (!config.id) {
        config.id = 'ms2extend-grid-product-tabs';
    }
    Ext.applyIf(config, {
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'mgr/producttabs/getlist'
        },
        save_action: 'mgr/producttabs/updatefromgrid',

        //Toolbar
        tbar: [
            //Search panel
            {
                xtype: 'textfield',
                id: 'ms2extend-product-tabs-search-filter',
                emptyText: _('ms2extend.controls.search'),
                listeners: {
                    'change': {fn: this.search, scope: this},
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
                handler: this.create,
                scope: this
            }
        ]
    });
    ms2Extend.grid.productTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.grid.productTabs, ms2Extend.grid.abstract, {
    gridFields: [
        'id',
        'name',
        'fields'
    ],

    gridColumns: [
        {header: _('id'), dataIndex: 'id', sortable: true, width: 0.05},
        {header: _('ms2extend.field.name'), dataIndex: 'name', sortable: true, width: 0.2, editor: {xtype: 'textfield'}},
        {header: _('ms2extend.field.tab_fields'), dataIndex: 'fields', sortable: true, width: 0.75, editor: {xtype: 'textarea'}}
    ],

    //Context menu function
    getMenu: function () {
        return [{
            text: _('ms2extend.controls.update'),
            handler: this.update,
            scope: this
        }, '-', {
            text: _('ms2extend.controls.remove'),
            handler: this.remove,
            scope: this
            /*handler: ms2Extend.function.removeRecord,
            baseParams: {
                action: 'mgr/producttabs/remove'
            }*/
        }];
    },

    create: function(btn, e) {
        var window = Ext.getCmp('ms2extend-window-product-tab');
        if (window) {
            window.close();
        }
        window = MODx.load({
            xtype: 'ms2extend-window-product-tab',
            title: _('ms2extend.controls.create'),
            baseParams: {
                action: 'mgr/producttabs/create',
            },
            parent: this
        });
        window.show(e.target);
    },

    update: function(btn, e) {
        var window = Ext.getCmp('ms2extend-window-product-tab');
        if (window) {
            window.close();
        }
        window = MODx.load({
            xtype: 'ms2extend-window-product-tab',
            title: _('ms2extend.controls.create'),
            baseParams: {
                action: 'mgr/producttabs/update',
            },
            parent: this
        });
        window.setRecord(this.menu.record);
        window.show(e.target);
    },

    remove: function(btn, e) {
        MODx.msg.confirm({
            title: _('ms2extend.controls.remove'),
            text: _('ms2extend.controls.remove_confirm'),
            url: this.config.url,
            params: {
                action: 'mgr/producttabs/remove',
                id: this.menu.record.id
            },
            listeners: {
                success: {fn: this.refresh, scope: this},
            }
        });

    }
});
Ext.reg('ms2extend-grid-product-tabs', ms2Extend.grid.productTabs);