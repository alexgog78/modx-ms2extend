<?php

if (!class_exists('abstractModuleManagerController')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/manager.class.php';
}

abstract class ms2ExtendManagerController extends abstractModuleManagerController
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
}