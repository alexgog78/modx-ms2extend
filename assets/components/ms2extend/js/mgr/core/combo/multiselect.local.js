'use strict';

Ext.namespace('ms2Extend.combo.multiSelectLocal');

ms2Extend.combo.multiSelectLocal.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        store: new Ext.data.SimpleStore({
            id: null,
            fields: ['value'],
            data: []
        }),
        displayField: 'value',
        valueField: 'value',
        allowAddNewData: false,

        //Core settings
        name: config.name || 'multiselect-local',
        dataIndex: config.name || 'multiselect-local',
        mode: 'local',
        minChars: 1,
        allowBlank: true,
        //emptyText: _('no'),
        emptyText: false,
        msgTarget: 'under',
        //addNewDataOnBlur: true,//TODO check
        extraItemCls: 'x-tag',
        expandBtnCls: 'x-form-trigger',
        clearBtnCls: 'x-form-trigger',
        triggerAction: 'all',
        listeners: {
            newitem: function (bs, value) {
                var valueField = this.valueField;
                var newItem = {};
                newItem[valueField] = value;
                bs.addNewItem(newItem);
            }
        }
    });
    if (!config.hiddenName) {
        config.hiddenName = config.name;
    }
    config.name += '[]';
    config.hiddenName += '[]';
    ms2Extend.combo.multiSelectLocal.abstract.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.combo.multiSelectLocal.abstract, Ext.ux.form.SuperBoxSelect);
