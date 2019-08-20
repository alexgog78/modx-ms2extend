ms2Extend.combo.selectType = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        store: [
            ['', _('no')],
            ['xtype', 'xtype'],
        ],
        fields: ['key', 'value'],
        displayField: 'value',
        valueField: 'key',
    });
    ms2Extend.combo.selectType.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.selectType, ms2Extend.combo.selectLocal);
Ext.reg('ms2extend-combo-select-type', ms2Extend.combo.selectType);