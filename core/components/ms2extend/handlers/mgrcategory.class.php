<?php

if (!class_exists('amHandler')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/handlers/handler.class.php';
}

class ms2ExtendMgrCategory extends amHandler
{
    /** @var ms2extendProductTab */
    //private $productTabFactory;

    /** @var modManagerController */
    private $controller;

    /** @var array */
    //private $tabsIds = [];

    /** @var array */
    //private $tabs = [];

    /**
     * ms2Extend constructor.
     * @param ms2Extend $module
     * @param array $config
     */
    public function __construct(& $module, array $config = [])
    {
        parent::__construct($module, $config);
        //$this->productTabFactory = $this->modx->newObject('ms2extendProductTab');
    }

    /**
     * @param modManagerController $controller
     */
    public function getLayout(modManagerController $controller)
    {
        $this->controller = $controller;
        /*$this->module->invokeEvent('ms2extOnGetProductLayout', [
            'controller' => $this->controller,
        ]);
        $this->module->addLexicon($this->controller);
        $this->addProductTabs();*/
    }
}
