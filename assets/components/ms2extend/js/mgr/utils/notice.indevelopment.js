'use strict';

ms2Extend.notice.indevelopment = function (config) {
    config = config || {};
    Ext.applyIf(config, {});
    ms2Extend.notice.indevelopment.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.notice.indevelopment, ms2Extend.notice.abstract, {
    panelHtml: _('ms2extend.field.indevelopment')
});
Ext.reg('ms2extend-notice-indevelopment', ms2Extend.notice.indevelopment);
