'use strict';

ms2Extend.combo.multiSelectXtype = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true,
        dataIndex: 'xtypes_combo',
    });
    ms2Extend.combo.multiSelectXtype.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectXtype, ms2Extend.combo.multiSelectLocal);
Ext.reg('ms2extend-combo-multiselect-xtype', ms2Extend.combo.multiSelectXtype);
