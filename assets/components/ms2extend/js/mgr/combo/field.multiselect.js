'use strict';

ms2Extend.combo.multiSelectField = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        store: new Ext.data.JsonStore({
            id: (config.id || 'ms2extend-combo-multiselect-field') + '-store',
            url: ms2Extend.config.connectorUrl,
            baseParams: {
                action: 'mgr/producttab/field/getlist',
            },
            fields: ['value'],
            root: 'results',
            totalProperty: 'total',
            autoLoad: false,
            autoSave: false,
        }),
        displayField: 'value',
        valueField: 'value',
        dataIndex: 'fields_combo',
        allowAddNewData: true
    });
    ms2Extend.combo.multiSelectField.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectField, ms2Extend.combo.multiSelectRemote);
Ext.reg('ms2extend-combo-multiselect-field', ms2Extend.combo.multiSelectField);
