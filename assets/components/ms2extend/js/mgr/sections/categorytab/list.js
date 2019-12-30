'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-categorytabs'
    });
});

ms2Extend.panel.categoryTabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-categorytab';
    }
    Ext.applyIf(config, {
        pageHeader: _('ms2extend.section.categorytabs')
    });
    ms2Extend.panel.categoryTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.categoryTabs, ms2Extend.panel.abstract, {
    getContent: function () {
        return [
            this.renderDescription(_('ms2extend.tab.categorytabs.management')),
            this.renderContent([{xtype: 'ms2extend-grid-categorytab'}])
        ];
    }
});
Ext.reg('ms2extend-panel-categorytabs', ms2Extend.panel.categoryTabs);
