<?php

require_once dirname(__FILE__) . '/manager.class.php';

class ms2ExtendMgrTabsManagerController extends ms2ExtendManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('section.tabs');
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/producttab/grid.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/producttab/window.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/categorytab/grid.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/categorytab/window.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/settingstab/grid.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/settingstab/window.js');
        $this->addLastJavascript($this->config['jsUrl'] . 'mgr/sections/tabs/list.js');
    }
}
