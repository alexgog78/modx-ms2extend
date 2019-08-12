<?php

if (!class_exists('ms2ExtendManagerController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class ms2ExtendMgrProducttabsManagerController extends ms2ExtendManagerController
{
    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('ms2extend.section.product-tabs');
    }

    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/product.tabs.grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/product.tab.window.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/product.tabs.panel.js');
    }
}