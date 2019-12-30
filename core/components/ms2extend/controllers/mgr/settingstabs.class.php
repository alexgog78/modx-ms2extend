<?php

if (!class_exists('ms2ExtendManagerController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class ms2ExtendMgrSettingstabsManagerController extends ms2ExtendManagerController
{
    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getLexicon('section.settingstabs');
    }

    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/window.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/settingstab/list.js');
    }
}
