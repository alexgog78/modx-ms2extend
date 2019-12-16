'use strict';

ms2Extend.combo.multiSelectXtype = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        store: new Ext.data.SimpleStore({
            id: (config.name || 'ms2extend-combo-multiselect-xtype') + '-store',
            fields: ['value'],
            data: []
        }),
        displayField: 'value',
        valueField: 'value',
        dataIndex: 'xtypes_combo',
        allowAddNewData: true
    });
    ms2Extend.combo.multiSelectXtype.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectXtype, ms2Extend.combo.multiSelectLocal);
Ext.reg('ms2extend-combo-multiselect-xtype', ms2Extend.combo.multiSelectXtype);
