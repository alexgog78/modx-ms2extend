<?php

require_once dirname(__FILE__) . '/config.inc.php';

class BuildTransport extends abstractBuildTransport
{
    /** @var bool */
    protected $namespace = true;

    /** @var bool */
    protected $coreFiles = true;

    /** @var bool */
    protected $assetsFiles = true;

    public function __construct(modX &$modx, $config = [])
    {
        $this->dataFolder = dirname(__FILE__) . '/data/';
        $this->resolversFolder = dirname(__FILE__) . '/resolvers/';
        parent::__construct($modx, $config);
    }

    //protected $menus = $menus;

    /*protected function getData()
    {
        //$this->menus = include 'data/transport.menus.php';
        $this->events = include 'data/transport.events.php';
    }*/
}
