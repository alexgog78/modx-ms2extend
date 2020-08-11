<?php

require_once dirname(__FILE__) . '/manager.class.php';

class ms2ExtendMgrFieldsManagerController extends ms2ExtendManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('section.fields');
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/fields/list.js');
    }
}
