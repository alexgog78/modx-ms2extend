<?php

if (!class_exists('AbstractModule')) {
    /** @noinspection PhpIncludeInspection */
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class ms2Extend extends AbstractModule
{
    /** @var string */
    protected $tablePrefix = 'ms2extend_';

    /** @var array */
    /*protected $handlers = [
        'default' => [],
        'mgr' => [
            'Base',
            'MsProduct',
            'MsCategory',
            'MsSettings',
        ],
        'web' => [],
    ];*/
    protected $handlersMap = [
        'mgrMsCategory' => 'mgr/mscategory',
        'mgrMsProduct' => 'mgr/msproduct',
        'mgrMsSettings' => 'mgr/mssettings',
    ];

    /**
     * @param array $config
     */
    protected function setConfig($config = [])
    {
        parent::setConfig($config);
        $this->config['ms2AssetsUrl'] = $this->assetsUrl . 'ms2/';
    }
}
