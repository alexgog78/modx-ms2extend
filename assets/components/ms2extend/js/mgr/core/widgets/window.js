'use strict';

ms2Extend.window.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        url: null,
        action: null,
        record: false,
        fields: this.getFields(config),
        width: config.width || 600,

        //Core settings
        autoHeight: true,
    });
    ms2Extend.window.abstract.superclass.constructor.call(this, config);
    this.on('beforeshow', this.beforeshow, this);
    this.on('hide', this.onhide, this);
    this.on('beforeSubmit', this.beforeSubmit, this);
    this.on('success', this.success, this);
    this.on('failure', this.failure, this);
};
Ext.extend(ms2Extend.window.abstract, MODx.Window, {
    defaultValues: {},

    renderForm: function () {
        if (!this.record) {
            this.setDefaultValues();
        } else {
            this.setRecord();
        }
        ms2Extend.window.abstract.superclass.renderForm.call(this);
    },

    getFields: function (config) {
        return [];
    },

    getFormInput: function (name, config = {}) {
        return ms2Extend.component.inputField(name, config);
    },

    setDefaultValues: function () {
        this.setValues(this.defaultValues);
    },

    setRecord: function () {
        this.setValues(this.record);
    },

    beforeshow: function () {
        this.reset();
        return true;
    },

    onhide: function () {
        return true;
    },

    beforeSubmit: function (record) {
        return true;
    },

    success: function (result) {
    },

    failure: function (result) {
    }
});
