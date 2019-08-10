//Modal window
ms2Extend.window.recordWindow = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        width: config.width || 600
    });
    ms2Extend.window.recordWindow.superclass.constructor.call(this, config);
};
Ext.extend(ms2Extend.window.recordWindow, MODx.Window);
Ext.reg('ms2extend-window-record', ms2Extend.window.recordWindow);