<?php

if (!$this->modx->loadClass('abstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true)) {
    return false;
}

class ms2ExtendMgrTabsManagerController extends abstractManagerController
{
    /**
     * @var array
     */
    protected $languageTopics = ['ms2extend:default'];

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getLexicon('section.tabs');
    }

    public function loadCustomCssJs()
    {
        $this->module->mgrBase->loadAssets($this);
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/window.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/window.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/window.js');
        $this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/tabs/list.js');
    }

    protected function getService()
    {
        $this->module = $this->modx->getService(
            'ms2extend',
            'ms2Extend',
            MODX_CORE_PATH . 'components/ms2extend/model/ms2extend/',
            [
                'ctx' => $this->modx->context->key
            ]
        );
    }
}
