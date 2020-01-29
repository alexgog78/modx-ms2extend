'use strict';

ms2Extend.notice.undefined = function (config) {
    config = config || {};
    Ext.applyIf(config, {});
    ms2Extend.notice.undefined.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.notice.undefined, ms2Extend.notice.abstract, {
    panelHtml: _('ms2colors.field.undefined')
});
Ext.reg('ms2extend-notice-undefined', ms2Extend.notice.undefined);
