'use strict';

ms2Extend.panel.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        title: null,
        components: [],

        //Core settings
        cls: 'container',
        items: [],
    });
    ms2Extend.panel.abstract.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.abstract, MODx.Panel, {
    initComponent: function () {
        if (this.items.length === 0) {
            if (this.title) {
                this.items.push(this._getHeader(this.title));
                this.title = '';
            }
            this.components = this.getComponents(this.initialConfig);
            this.items.push(this.components);
        }
        ms2Extend.panel.abstract.superclass.initComponent.call(this);
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
        return ms2Extend.component.tabs(items);
    },

    getDescription: function (html, config = {}) {
        return ms2Extend.component.panelDescription(html, config);
    },

    getContent: function (items, config = {}) {
        return ms2Extend.component.panelContent(items, config);
    },

    _getHeader: function (html) {
        return ms2Extend.component.panelHeader(html);
    },
});
