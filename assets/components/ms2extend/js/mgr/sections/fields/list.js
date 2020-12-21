'use strict';

Ext.namespace('ms2Extend.page.fields');

ms2Extend.page.fields.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'ms2extend-panel-fields',
        }]
    });
    ms2Extend.page.fields.list.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.page.fields.list, ms2Extend.page.abstract, {});
Ext.reg('ms2extend-page-fields-list', ms2Extend.page.fields.list);
