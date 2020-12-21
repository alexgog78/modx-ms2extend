'use strict';

ms2Extend.panel.tabs = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2extend-panel-tabs';
    }
    Ext.applyIf(config, {
        title: _('ms2extend_tabs'),
    });
    ms2Extend.panel.tabs.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.panel.tabs, ms2Extend.panel.abstract, {
    getComponents: function (config) {
        return this.renderTabsPanel([{
            title: _('ms2extend_tab_list_product'),
            items: [
                this.getDescription(_('ms2extend_tab_list_product_management')),
                this.getContent([{xtype: 'ms2extend-grid-producttab'}])
            ]
        }, {
            title: _('ms2extend_tab_list_category'),
            items: [
                this.getDescription(_('ms2extend_tab_list_category_management')),
                this.getContent([{xtype: 'ms2extend-grid-categorytab'}])
            ]
        }, {
            title: _('ms2extend_tab_list_settings'),
            items: [
                this.getDescription(_('ms2extend_tab_list_settings_management')),
                this.getContent([{xtype: 'ms2extend-grid-settingstab'}])
            ]
        }]);
    }
});
Ext.reg('ms2extend-panel-tabs', ms2Extend.panel.tabs);
