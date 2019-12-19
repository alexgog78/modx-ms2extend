ms2Extend.util.panelNotice.undefined = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-util-panelnotice-undefined';
    }
    Ext.applyIf(config, {});
    ms2Extend.util.panelNotice.undefined.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.util.panelNotice.undefined, ms2Extend.util.panelNotice.abstract, {
    panelHtml: _('ms2extend.field.undefined')
});
Ext.reg('ms2extend-util-panelnotice-undefined', ms2Extend.util.panelNotice.undefined);
