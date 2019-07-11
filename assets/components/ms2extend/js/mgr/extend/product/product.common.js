Ext.override(miniShop2.panel.Product, {
	originals: {
		getFields: miniShop2.panel.Product.prototype.getFields
	}
	
	,getFields: function(config) {
		var originals = this.originals.getFields.call(this, config);
		for(var i in originals) {
			if(!originals.hasOwnProperty(i)) continue;
			var item = originals[i];
			
			if(item.id=='modx-resource-tabs'){
				//Горизонтальные вкладки			
				for (var i2 in item.items) {
					if (!item.items.hasOwnProperty(i2)) {
						continue;
					}
					
					var tab = item.items[i2];
					if(tab.id=='minishop2-product-tab'){
						console.log(ms2Extend.tabs);
						for(key in ms2Extend.tabs){
							if (!ms2Extend.tabs.hasOwnProperty(key)) {
								continue;
							}
							
							var dopTab = this.addTabs(config, ms2Extend.tabs[key]);
							//tab.items[0].items.push(dopTab);
							tab.items[0].items.splice(3, 0, dopTab);
						}
					}
				}
			}
		}
		return originals;
	}
	
	//Дополнительные вкладки
	,addTabs: function (config, tab) {
		var enabled = miniShop2.config.data_fields;
		var available = tab.fields;

		var product_fields = this.getAllProductFields(config);
		var col1 = [];
		var col2 = [];
		var tmp;
		for (var i = 0; i < available.length; i++) {
			var field = available[i];
			if ((enabled.length > 0 && enabled.indexOf(field) === -1) || this.active_fields.indexOf(field) !== -1) {
				continue;
			}
			if (tmp = product_fields[field]) {
				this.active_fields.push(field);
				tmp = this.getExtField(config, field, tmp);
				if (i % 2) {
					col2.push(tmp);
				}
				else {
					col1.push(tmp);
				}
			}
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
});