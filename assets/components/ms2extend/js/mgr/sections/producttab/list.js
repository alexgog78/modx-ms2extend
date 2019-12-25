'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-producttabs'
    });
});

ms2Extend.panel.productTabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-producttab';
    }
    Ext.applyIf(config, {
        pageHeader: _('ms2extend.section.producttabs')
    });
    ms2Extend.panel.productTabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.productTabs, ms2Extend.panel.abstract, {
    getContent: function () {
        return [
            this.renderDescription(_('ms2extend.tab.producttabs.management')),
            this.renderContent([{xtype: 'ms2extend-grid-producttab'}])
        ];
    }
});
Ext.reg('ms2extend-panel-producttabs', ms2Extend.panel.productTabs);
