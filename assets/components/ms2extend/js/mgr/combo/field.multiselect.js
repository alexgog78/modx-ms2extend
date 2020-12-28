'use strict';

ms2Extend.combo.multiSelectRemote.field = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        store: new Ext.data.JsonStore({
            id: (config.id || 'ms2extend-combo-multiselect-field') + '-store',
            url: ms2Extend.config.connectorUrl,
            baseParams: {
                action: 'mgr/producttab/field/getlist',
                combo: true,
            },
            fields: ['value'],
            root: 'results',
            totalProperty: 'total',
            autoLoad: false,
            autoSave: false,
        }),
        dataIndex: 'fields_combo',
    });
    ms2Extend.combo.multiSelectRemote.field.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectRemote.field, ms2Extend.combo.multiSelectRemote.abstract);
Ext.reg('ms2extend-combo-multiselect-field', ms2Extend.combo.multiSelectRemote.field);
