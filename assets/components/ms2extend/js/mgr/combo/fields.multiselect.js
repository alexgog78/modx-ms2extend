ms2Extend.combo.multiSelectFields = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        displayField: 'field',
        valueField: 'field',
        dataIndex: 'fields',
        allowAddNewData: true,
    });
    ms2Extend.combo.multiSelectFields.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectFields, ms2Extend.combo.multiSelectLocal);
Ext.reg('ms2extend-combo-multiselect-fields', ms2Extend.combo.multiSelectFields);