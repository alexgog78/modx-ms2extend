Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function () {
    this.on('beforerender', function () {
        var panel = this;
        var resourcePanel = Ext.getCmp('modx-panel-resource');
        var productFields = resourcePanel.getAllProductFields(resourcePanel);
        var activeFields = resourcePanel.active_fields;

        var panelTabs = [];
        Ext.each(ms2Extend.tabs, function(tab) {
            var tabFields = [];
            tab.fields = Ext.decode(tab.fields, true);
            Ext.each(tab.fields, function(field) {
                switch (tab.type) {
                    case 'xtype':
                        if (!field) {
                            return true;
                        }
                        tabFields.push({xtype: field});
                        break;
                    default:
                        fieldConfig = productFields[field];
                        if (!fieldConfig || activeFields.indexOf(field) !== -1) {
                            return true;
                        }
                        activeFields.push(field);
                        fieldXtype = miniShop2.utils.getExtField(resourcePanel, field, fieldConfig);
                        tabFields.push(fieldXtype);
                        break;
                }
            });
            if (!tabFields.length) {
                return true;
            }

            panelTabs.push({
                id: tab.id,
                title: tab.name,
                fields: tabFields,
            });
        });
        if (!panelTabs.length) {
            return;
        }

        panel.add({
            title: _('ms2extend.tab.product-options'),
            items: [{
                xtype: 'ms2extend-productpage-tabspanel',
                panelTabs: panelTabs,
            }]
        });
    });
});