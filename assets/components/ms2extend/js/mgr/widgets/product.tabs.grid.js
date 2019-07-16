ms2Extend.grid.productTabs = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Settings
        id: 'ms2ext-grid-product-tabs',
        url: ms2Extend.config.connectorUrl,
        baseParams: {
            action: 'producttabs/getlist'
        },
        paging: true,
        remoteSort: true,
        anchor: '97%',
        save_action: 'producttabs/updatefromgrid',
        autosave: true,

        //Grid
        fields: [
            'id',
            'name',
            'fields'
        ],
        columns: [
            {header: _('id'), dataIndex: 'id', sortable: true, width: 0.05},
            {
                header: _('ms2ext.field.name'),
                dataIndex: 'name',
                sortable: true,
                width: 0.2,
                editor: {xtype: 'textfield'}
            },
            {
                header: _('ms2ext.field.tab.fields'),
                dataIndex: 'fields',
                sortable: true,
                width: 0.75,
                editor: {xtype: 'textarea'}
            }
        ],

        //Toolbar
        tbar: [
            //Search panel
            {
                xtype: 'textfield',
                id: 'ms2ext-product-tabs-search-filter',
                emptyText: _('ms2ext.controls.search'),
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
                text: _('ms2ext.controls.create'),
                cls: 'primary-button',
                scope: this,
                handler: ms2Extend.function.createRecord,
                baseParams: {
                    action: 'producttabs/create',
                    fields: this.getFields(),
                    defaults: {
                        active: true
                    }
                }
            }
        ],

        //Grid row additional classes
        viewConfig: {
            forceFit: true,
            getRowClass: function (record, index, rowParams, store) {
                var rowClass = [];
                if (record.get('active') == 0 || record.get('blocked') == 1)
                    rowClass.push('grid-row-inactive');
                return rowClass.join(' ');
            }
        }
    });
    ms2Extend.grid.productTabs.superclass.constructor.call(this, config)
};
Ext.extend(ms2Extend.grid.productTabs, MODx.grid.Grid, {
    //Context menu function
    getMenu: function () {
        return [{
            text: _('ms2ext.controls.update'),
            handler: ms2Extend.function.updateRecord,
            baseParams: {
                action: 'producttabs/update',
                fields: this.getFields('update')
            }
        }, '-', {
            text: _('ms2ext.controls.remove'),
            handler: ms2Extend.function.removeRecord,
            baseParams: {
                action: 'producttabs/remove'
            }
        }];
    },

    //Form fields function
    getFields: function (action) {
        var fields = [];
        fields.push(
            {xtype: 'hidden', name: 'id'},
            {xtype: 'textfield', name: 'name', fieldLabel: _('ms2ext.field.name'), anchor: '100%'},
            {xtype: 'textarea', name: 'fields', fieldLabel: _('ms2ext.field.tab.fields'), anchor: '100%'}
        );
        return fields;
    }
});
Ext.reg('ms2ext-grid-product-tabs', ms2Extend.grid.productTabs);