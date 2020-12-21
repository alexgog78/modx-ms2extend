'use strict';

Ext.namespace('ms2Extend.page.tabs');

ms2Extend.page.tabs.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'ms2extend-panel-tabs',
        }]
    });
    ms2Extend.page.tabs.list.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.page.tabs.list, ms2Extend.page.abstract, {});
Ext.reg('ms2extend-page-tabs-list', ms2Extend.page.tabs.list);
