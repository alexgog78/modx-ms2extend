'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-settingstabs'
    });
});

ms2Extend.panel.settingsTabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-settingstab';
    }
    Ext.applyIf(config, {
        pageHeader: _('ms2extend.section.settingstabs')
    });
    ms2Extend.panel.settingsTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.settingsTabs, ms2Extend.panel.abstract, {
    getContent: function () {
        return [
            this.renderDescription(_('ms2extend.tab.settingstabs.management')),
            this.renderContent([{xtype: 'ms2extend-grid-settingstab'}])
        ];
    }
});
Ext.reg('ms2extend-panel-settingstabs', ms2Extend.panel.settingsTabs);
