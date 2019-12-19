'use strict';

ms2Extend.panel.productTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-producttab';
    }
    Ext.applyIf(config, {
        pageHeader: _('ms2extend.section.producttabs')
    });
    ms2Extend.panel.productTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.productTab, ms2Extend.panel.simple, {
    getContent: function () {
        return [
            this.renderDescription(_('ms2extend.tab.producttabs.management')),
            this.renderContent([{xtype: 'ms2extend-grid-producttab'}])
        ];
    }
});
Ext.reg('ms2extend-panel-producttab', ms2Extend.panel.productTab);
Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-producttab'
    });
});
