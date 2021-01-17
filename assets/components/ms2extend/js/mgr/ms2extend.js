'use strict';

var ms2Extend = function (config) {
    config = config || {};
    ms2Extend.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend, Ext.Component, abstractModule);
Ext.reg('ms2extend', ms2Extend);
ms2Extend = new ms2Extend();
