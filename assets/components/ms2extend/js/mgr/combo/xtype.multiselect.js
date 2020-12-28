'use strict';

ms2Extend.combo.multiSelectRemote.xtype = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true,
        dataIndex: 'xtypes_combo',
    });
    ms2Extend.combo.multiSelectRemote.xtype.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectRemote.xtype, ms2Extend.combo.multiSelectLocal.abstract);
Ext.reg('ms2extend-combo-multiselect-xtype', ms2Extend.combo.multiSelectRemote.xtype);
