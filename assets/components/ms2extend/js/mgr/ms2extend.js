var ms2Extend = function(config){
	config = config || {};
	ms2Extend.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend, Ext.Component, {
	page: {},
	window: {},
	grid: {},
	tree: {},
	panel: {},
	combo: {},
	config: {},
	renderer: {},
	function: {},
});
Ext.reg('ms2ext', ms2Extend);
ms2Extend = new ms2Extend();