<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config/config.inc.php';

if (!class_exists('AbstractCLI')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/cli/abstractcli.class.php';
}

class ms2ExtendPluginRemove extends AbstractCLI
{
    /** @var string */
    private $pluginName;

    /** @var minishop2 */
    private $miniShop2;

    /**
     * ms2ExtendPluginAdd constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->pluginName = $config[0];

        $this->miniShop2 = $this->modx->getService('miniShop2');
        if (!$this->miniShop2) {
            $this->log('Could not load miniShop2');
            exit;
        }
    }

    public function run()
    {
        $this->miniShop2->removePlugin($this->pluginName);
        $this->log('Success: removed plugin: ' . $this->pluginName);
    }
}

array_shift($argv);
$ms2Plugins = new ms2ExtendPluginRemove($argv);
$ms2Plugins->run();
exit();
