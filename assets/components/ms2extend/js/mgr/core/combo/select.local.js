'use strict';

ms2Extend.combo.selectLocal = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        store: [],
        fields: [],
        displayField: null,
        valueField: null,

        //Core settings
        queryMode: 'local',
        name: config.name || 'select-local',
        typeAhead: true,
        editable: true,
        allowBlank: true,
        emptyText: _('no'),
    });
    if (!config.hiddenName) {
        config.hiddenName = config.name;
    }
    ms2Extend.combo.selectLocal.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.selectLocal, MODx.combo.ComboBox);
