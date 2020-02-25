<?php

require_once dirname(__FILE__) . '/config.inc.php';

$basePath = dirname(dirname(dirname(__FILE__)));

/** @noinspection PhpIncludeInspection */
require_once $basePath . '/public_html/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$plugins = [
    [
        'ms2ExtendProductGeneral',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/plugins/product/general/index.php',
    ],
    [
        'ms2ExtendProductFrontDoors',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/plugins/product/frontdoors/index.php',
    ],
    [
        'ms2ExtendProductInteriorDoors',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/plugins/product/interiordoors/index.php',
    ],
    [
        'ms2ExtendProductFurniture',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/plugins/product/furniture/index.php',
    ],
    [
        'ms2ExtendProductEstet',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/plugins/product/estet/index.php',
    ],
];

$services = [
    [
        'cart',
        'ms2extendCartHandler',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/handlers/cart/ms2extendcarthandler.class.php',
    ],
    [
        'order',
        'ms2extendOrderHandler',
        '{core_path}components/' . PKG_NAME_LOWER . '/ms2/handlers/order/ms2extendorderhandler.class.php',
    ]
];

class registerServices
{
    /** @var modX */
    protected $modx;

    /** @var array */
    private $plugins = [];

    /** @var array */
    private $services = [];

    /** @var miniShop2|null */
    private $ms2;

    /**
     * registerServices constructor.
     * @param modX $modx
     * @param array $plugins
     * @param array $services
     */
    public function __construct(modX &$modx, $plugins = [], $services = [])
    {
        $this->modx = &$modx;
        $this->plugins = $plugins;
        $this->services = $services;
        if (!$this->ms2 = $this->modx->getService('miniShop2')) {
            die('Could not initialize miniShop2');
        }
    }

    public function process()
    {
        //$this->addPlugins();
        $this->addServices();
    }

    private function addPlugins()
    {
        foreach ($this->plugins as $plugin) {
            $this->ms2->addPlugin($plugin[0], $plugin[1]);
            $this->modx->log(modX::LOG_LEVEL_INFO, 'addPlugin: ' . $plugin[0] . ' ' . $plugin[1]);
        }
    }

    private function addServices()
    {
        foreach ($this->services as $service) {
            $this->ms2->addService($service[0], $service[1], $service[2]);
            $this->modx->log(modX::LOG_LEVEL_INFO, 'addService: ' . $service[0] . ' ' . $service[1] . ' ' . $service[2]);
        }
    }
}

echo '<pre>';
$registerServices = new registerServices($modx, $plugins, $services);
$registerServices->process();
echo '</pre>';

exit();
