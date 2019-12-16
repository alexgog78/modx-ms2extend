ms2Extend.util.panelNotice.indevelopment = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-util-panelnotice-indevelopment';
    }
    Ext.applyIf(config, {});
    ms2Extend.util.panelNotice.indevelopment.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.util.panelNotice.indevelopment, ms2Extend.util.panelNotice.abstract, {
    panelHtml: _('ms2extend.field.indevelopment')
});
Ext.reg('ms2extend-util-panelnotice-indevelopment', ms2Extend.util.panelNotice.indevelopment);