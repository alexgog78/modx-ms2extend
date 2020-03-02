'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-fields'
    });
});

ms2Extend.panel.fields = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-fields';
    }
    Ext.applyIf(config, {
        pageHeader: _('ms2extend.section.fields')
    });
    ms2Extend.panel.fields.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.fields, ms2Extend.panel.abstract, {
    getContent: function () {
        return [
            this.renderDescription(_('ms2extend.section.fields.management')),
            this.renderContent([{xtype: 'ms2extend-notice-indevelopment'}])
        ];
    }
});
Ext.reg('ms2extend-panel-fields', ms2Extend.panel.fields);
