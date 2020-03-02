<?php

//TODO

require_once dirname(__FILE__) . '/config.inc.php';

//TODO JSON data
class ms2Services extends AbstractCommand
{
    /** @var miniShop2 */
    private $ms2;

    /**
     * ms2Services constructor.
     * @param modX $modx
     * @param array $config
     */
    public function __construct(modX &$modx, $config = [])
    {
        parent::__construct($modx, $config);
        $this->ms2 = $this->modx->getService('miniShop2');
        if (!$this->ms2) {
            $this->log('Could not initialize miniShop2', modX::LOG_LEVEL_ERROR);
            die();
        }
    }

    public function run()
    {
        foreach (MS2_SERVICES as $service) {
            $this->ms2->addService($service['type'], $service['name'], $service['path']);
            $this->log('Success: addService ' . $service['type'] . ' => ' . $service['name'] . '(' . $service['path'] . ')');
        }
    }
}
