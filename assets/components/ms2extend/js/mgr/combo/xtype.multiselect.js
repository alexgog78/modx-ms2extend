'use strict';

ms2Extend.combo.multiSelect.local.xtype = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true,
        dataIndex: 'xtypes_combo',
    });
    ms2Extend.combo.multiSelect.local.xtype.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelect.local.xtype, ms2Extend.combo.multiSelect.local.abstract);
Ext.reg('ms2extend-combo-multiselect-xtype', ms2Extend.combo.multiSelect.local.xtype);
