<?php

if (!class_exists('amMgrHandler')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/handlers/mgr.class.php';
}

class ms2ExtendMgrBaseHandler extends amMgrHandler
{
    /**
     * @param modManagerController $controller
     */
    public function loadAssets(modManagerController $controller)
    {
        parent::loadAssets($controller);
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/field.multiselect.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/xtype.multiselect.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.indevelopment.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.undefined.js');
    }
}
