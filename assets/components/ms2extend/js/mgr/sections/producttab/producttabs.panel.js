'use strict';

Ext.onReady(function () {
    MODx.add({
        xtype: 'ms2extend-panel-producttab'
    });
});
ms2Extend.panel.productTab = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-producttab';
    }
    Ext.applyIf(config, {
        pageHeader: _('ms2extend.section.product_tabs')
    });
    ms2Extend.panel.productTab.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.productTab, ms2Extend.panel.abstract, {
    renderPanel: function () {
        this.renderToursPanel();
        return this.renderSimplePanel();
    },

    renderToursPanel: function () {
        var panelDescription = this.renderPanelDescription(_('ms2extend.tab.product_tabs.management'));
        var panelGrid = this.renderPanelContent([
            {xtype: 'ms2extend-grid-producttab'}
        ]);
        this.panelContent.push(panelDescription);
        this.panelContent.push(panelGrid);
    }
});
Ext.reg('ms2extend-panel-producttab', ms2Extend.panel.productTab);
