<?php

if (!class_exists('ms2ExtendManagerController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class ms2ExtendMgrFieldsManagerController extends ms2ExtendManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('section.fields');
    }

    public function loadCustomCssJs()
    {
        $this->module->mgrBase->loadAssets($this);
        /*$this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/window.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/window.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/window.js');*/
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/fields/list.js');
    }
}
