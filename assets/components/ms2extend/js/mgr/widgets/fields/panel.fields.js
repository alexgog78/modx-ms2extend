'use strict';

ms2Extend.panel.fields = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-fields';
    }
    Ext.applyIf(config, {
        title: _('ms2extend_field_list')
    });
    ms2Extend.panel.fields.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.fields, ms2Extend.panel.abstract, {
    getComponents: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('ms2extend_field_list_management')),
            this.getContent([
                ms2Extend.component.notice(_('ms2extend_indevelopment'))
            ]),
        ]);
    }
});
Ext.reg('ms2extend-panel-fields', ms2Extend.panel.fields);
