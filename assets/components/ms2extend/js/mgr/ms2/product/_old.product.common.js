//Горизонтальные вкладки
Ext.override(miniShop2.panel.Product, {
    /*originals: {
        getFields: miniShop2.panel.Product.prototype.getFields
    },

    getFields: function(config) {
        var originals = this.originals.getFields.call(this, config);
        for(var i in originals) {
            if(!originals.hasOwnProperty(i)) continue;
            var item = originals[i];

            if(item.id=='modx-resource-tabs'){
                //Горизонтальные вкладки
                item.items.push({
                    title: 'Zzzz'
                });
            }
        }
        return originals;
    }*/
});


//Вертикальные вкладки
Ext.override(miniShop2.panel.ProductSettings, {
    initComponent: function () {
        miniShop2.panel.ProductSettings.superclass.initComponent.call(this);
        config = this.initialConfig

        var i = 2;
        for (key in ms2Extend.tabs) {
            var item = ms2Extend.tabs[key];
            if (!item.id) continue;

            var tab = {
                id: 'vertical-doptab-' + item.id,
                title: item.name,
                hideMode: 'offsets',
                anchor: '100%',
                items: [{
                    layout: 'column',
                    border: false,
                    anchor: '100%',
                    defaults: {
                        labelSeparator: '',
                        labelAlign: 'top',
                        border: false,
                        msgTarget: 'under'
                    },
                    items: [{
                        columnWidth: .5,
                        layout: 'form',
                        items: this.customGetExtraFields(config, item.fields)
                    }]
                }],
                listeners: config.listeners
            }

            this.insert(i, tab);
            i++;
        }
    },


    //Получение полей Вкладки
    customGetExtraFields: function (config, fields) {
        config = config || {record: {}};
        var enabled = fields;
        var items = this.getProductFields(config, enabled, fields);
        if (items.length > 0) {
            return {
                xtype: 'fieldset',
                items: items
            };
        } else {
            return [];
        }
    }
});