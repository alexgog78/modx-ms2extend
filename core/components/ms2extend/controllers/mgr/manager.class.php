<?php

if (!class_exists('amManagerController')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/manager.class.php';
}

abstract class ms2ExtendManagerController extends amManagerController
{
    /**
     * @var array
     */
    protected $languageTopics = ['ms2extend:default'];

    /**
     * @return void
     */
    protected function getService()
    {
        $this->module = $this->modx->getService(
            'ms2extend',
            'ms2extend',
            $this->modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/',
            []
        );
    }

    /**
     * @return void
     */
    protected function loadProductTabsCssJs()
    {
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/producttab.grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/producttab.window.js');
    }
}
