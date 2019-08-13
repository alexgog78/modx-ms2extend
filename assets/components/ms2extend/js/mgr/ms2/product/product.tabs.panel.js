Ext.namespace('ms2Extend.productPage');

ms2Extend.productPage.tabsPanel = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-productpage-tabspanel';
    }
    Ext.applyIf(config, {
        items: [{
            xtype: 'modx-vtabs',
            autoTabs: true,
            border: false,
            plain: true,
            deferredRender: false,
            id: config.id + '-vtabs',
            items: this.getPanelTabs(config.panelTabs),
        }]
    });
    ms2Extend.productPage.tabsPanel.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.productPage.tabsPanel, MODx.Panel, {
    getPanelTabs: function (panelTabs) {
        var panel = [];
        Ext.each(panelTabs, function (tab) {
            panel.push({
                layout: 'form',
                labelAlign: 'top',
                title: tab.title,
                bodyCssClass: 'main-wrapper',
                items: tab.fields
            });
        });
        return panel;
    }
});
Ext.reg('ms2extend-productpage-tabspanel', ms2Extend.productPage.tabsPanel);