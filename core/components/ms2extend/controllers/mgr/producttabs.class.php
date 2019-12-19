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
        return $this->getLexicon('section.producttabs');
    }

    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->loadProductTabsCssJs();
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/producttab/panel.js');
    }
}
