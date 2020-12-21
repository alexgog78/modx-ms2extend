'use strict';

var ms2Extend = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        config: {},
        page: {},
        panel: {},
        formPanel: {},
        grid: {},
        localGrid: {},
        window: {},
        tree: {},
        combo: {},
        component: {},
        renderer: {},
        function: {},
    });
    ms2Extend.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend, Ext.Component);
Ext.reg('ms2extend', ms2Extend);
ms2Extend = new ms2Extend();
