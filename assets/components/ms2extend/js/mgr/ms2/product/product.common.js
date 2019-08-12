ms2Extend.productTab = {
    /*originals: {
        getFields: miniShop2.panel.Product.prototype.getFields
    },*/



    /*getFields: function (config) {
        var _this = this;
        var originals = _this.originals.getFields.call(_this, config);
        var resourceTabs = originals.find(item => item.id === 'modx-resource-tabs');
        var productTabWrapper = resourceTabs.items.find(item => item.id === 'minishop2-product-tab');
        var productTabs = productTabWrapper.items.find(item => item.id === 'minishop2-product-tabs');

        Ext.each(ms2ExtendConfig.tabs, function(item) {
            var newTab = _this.addTab(config, item);
            productTabs.items.splice(3, 0, newTab);
        });

        return originals;
    },*/

    getTab: function (tab, config) {
        console.log(config);
        var enabled = miniShop2.config.data_fields;
        console.log(enabled);
        var available = tab.fields;
        console.log(available);

        //var product_fields = miniShop2.panel.Product.prototype.getAllProductFields(config);
        var col1 = [];
        var col2 = [];
        var tmp;
        for (var i = 0; i < available.length; i++) {
            var field = available[i];
            if ((enabled.length > 0 && enabled.indexOf(field) === -1) || miniShop2.panel.Product.prototype.active_fields.indexOf(field) !== -1) {
                continue;
            }
            //if (tmp = product_fields[field]) {
                miniShop2.panel.Product.prototype.active_fields.push(field);
                tmp = miniShop2.panel.Product.prototype.getExtField(config, field, tmp);
                if (i % 2) {
                    col2.push(tmp);
                } else {
                    col1.push(tmp);
                }
            //}
        }


        return {
            title: tab.name,
            bodyCssClass: 'main-wrapper',
            items: [{
                layout: 'column',
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    labelAlign: 'top',
                    items: col1,
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    labelAlign: 'top',
                    items: col2,
                }],
            }],
            listeners: {},
        };
    }
};
Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function () {
    this.on('beforerender', function () {
        var panel = this;
        var config = panel.config;
        Ext.each(ms2Extend.tabs, function(tab) {
            panel.add(ms2Extend.productTab.getTab(tab, config));
        });
    });
});