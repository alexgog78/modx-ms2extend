<?php

class ms2ExtendMgrBaseHandler extends AbstractMgrHandler
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
