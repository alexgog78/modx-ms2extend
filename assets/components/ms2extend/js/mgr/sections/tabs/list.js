'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-tabs'
    });
});

ms2Extend.panel.tabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-tabs';
    }
    Ext.applyIf(config, {
        tabs: true,
        pageHeader: _('ms2extend.section.tabs')
    });
    ms2Extend.panel.tabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.tabs, ms2Extend.panel.abstract, {
    getContent: function () {
        return [{
            title: _('ms2extend.tab.producttabs'),
            items: [
                this.renderDescription(_('ms2extend.tab.producttabs.management')),
                this.renderContent([{xtype: 'ms2extend-grid-producttab'}])
            ]
        }, {
            title: _('ms2extend.tab.categorytabs'),
            items: [
                this.renderDescription(_('ms2extend.tab.categorytabs.management')),
                this.renderContent([{xtype: 'ms2extend-grid-categorytab'}])
            ]
        }, {
            title: _('ms2extend.tab.settingstabs'),
            items: [
                this.renderDescription(_('ms2extend.tab.settingstabs.management')),
                this.renderContent([{xtype: 'ms2extend-grid-settingstab'}])
            ]
        }];
    }
});
Ext.reg('ms2extend-panel-tabs', ms2Extend.panel.tabs);
