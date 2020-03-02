<?php

if (!class_exists('AbstractModule')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class ms2Extend extends AbstractModule
{
    /** @var string */
    protected $tablePrefix = 'ms2extend_';

    /** @var array */
    protected $handlers = [
        'default' => [],
        'mgr' => [
            'Base',
            'MsProduct',
            'MsCategory',
            'MsSettings',
        ],
        'web' => [],
    ];

    /**
     * @param array $config
     * @return array
     */
    protected function getConfig($config = [])
    {
        $config = parent::getConfig($config);
        $config['ms2AssetsUrl'] = $config['assetsUrl'] . 'ms2/';
        return $config;
    }
}
