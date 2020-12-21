'use strict';

ms2Extend.formPanel.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        url: null,
        baseParams: {
            action: null
        },
        title: null,
        components: [],
        record: null,

        //Core settings
        items: [],
        cls: 'container form-with-labels',
        listeners: {
            'setup': {fn: this.setup, scope: this},
            'success': {fn: this.success, scope: this},
            'beforeSubmit': {fn: this.beforeSubmit, scope: this}
        },
    });
    ms2Extend.formPanel.abstract.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.formPanel.abstract, MODx.FormPanel, {
    defaultValues: {},

    initComponent: function () {
        if (this.items.length === 0) {
            if (this.title) {
                this.items.push(this._getHeader(this.title));
                this.title = '';
            }
            this.components = this.getComponents(this.initialConfig);
            this.items.push(this.components);
        }
        ms2Extend.formPanel.abstract.superclass.initComponent.call(this);
    },

    setup: function () {
        if (!this.record) {
            this.setDefaultValues();
        } else {
            this.setRecord();
        }
        this.fireEvent('ready', this.record);
        MODx.fireEvent('ready');
    },

    setDefaultValues: function () {
        this.getForm().setValues(this.defaultValues);
    },

    setRecord: function () {
        this.getForm().setValues(this.record);
    },

    success: function (o) {
        this.record = o.result.object;
        return true;
    },

    beforeSubmit: function (o) {
        return true;
    },

    getComponents: function (config) {
        return this.components;
    },

    renderPlainPanel: function (items) {
        return {
            cls: 'x-form-label-left',
            items: items,
        };
    },

    renderTabsPanel: function (items) {
        return ms2Extend.component.tabs(items, {
            bodyCssClass: 'tab-panel-wrapper'
        });
    },

    getDescription: function (html, config = {}) {
        return ms2Extend.component.panelDescription(html, config);
    },

    getContent: function (items, config = {}) {
        return ms2Extend.component.panelContent(items, config);
    },

    getFormInput: function (name, config = {}) {
        return ms2Extend.component.inputField(name, config);
    },

    _getHeader: function (html) {
        return ms2Extend.component.panelHeader(html);
    },
});
