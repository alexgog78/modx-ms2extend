<?php

if (!class_exists('ms2ExtendManagerController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class ms2ExtendMgrCategorytabsManagerController extends ms2ExtendManagerController
{
    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getLexicon('section.categorytabs');
    }

    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/window.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/categorytab/list.js');
    }
}
