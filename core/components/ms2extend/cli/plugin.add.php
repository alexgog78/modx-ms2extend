<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config/config.inc.php';

if (!class_exists('AbstractCLI')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/cli/abstractcli.class.php';
}

class ms2ExtendPluginAdd extends AbstractCLI
{
    /** @var string */
    private $pluginName;

    /** @var string */
    private $pluginController;

    /** @var minishop2 */
    private $miniShop2;

    /**
     * ms2ExtendPluginAdd constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->pluginName = implode('_', [
            $config[0],
            $config[1],
            $config[2],
        ]);
        $this->pluginController = implode('/', [
            '{core_path}components',
            $config[0],
            'ms2/plugins',
            $config[1],
            $config[2],
            'index.php',
        ]);

        $this->miniShop2 = $this->modx->getService('miniShop2');
        if (!$this->miniShop2) {
            $this->log('Could not load miniShop2');
            exit;
        }
    }

    public function run()
    {
        $this->miniShop2->addPlugin($this->pluginName, $this->pluginController);
        $this->log('Success: added plugin ' . $this->pluginName . ' [' . $this->pluginController . ']');
    }
}

array_shift($argv);
$ms2Plugins = new ms2ExtendPluginAdd($argv);
$ms2Plugins->run();
exit();
