<?php

if (!class_exists('amHandler')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/handlers/handler.class.php';
}

class ms2ExtendMgrProduct extends amHandler
{
    /** @var ms2extendProductTab */
    private $productTabFactory;

    /** @var modManagerController */
    private $controller;

    /** @var array */
    private $tabsIds = [];

    /** @var array */
    private $tabs = [];

    /**
     * abstractHandler constructor.
     * @param abstractModule $module
     * @param array $config
     */
    public function __construct(& $module, array $config = [])
    {
        parent::__construct($module, $config);
        $this->productTabFactory = $this->modx->newObject('ms2extendProductTab');
    }

    /**
     * @param modManagerController $controller
     */
    public function getProductLayout(modManagerController $controller)
    {
        $this->controller = $controller;
        $this->module->invokeEvent('ms2extOnGetProductLayout', [
            'controller' => $this->controller,
        ]);
        $this->module->addLexicon($this->controller);
        $this->addProductTabs();
    }

    /**
     * return void
     */
    private function addProductTabs()
    {
        $response = $this->module->invokeEvent('ms2extOnGetProductTabs', [
            'resource' => $this->controller->resource,
        ]);
        $this->tabsIds = $response['returnedValues']['tabsIds'] ?? [];
        $this->getProductTabs();

        $configJs = $this->modx->toJSON([
            'recordId' => $this->controller->resource->id,
            'productTabs' => $this->tabs,
        ]);
        $this->controller->addHtml('
            <script type="text/javascript">
                Ext.apply(' . get_class($this->module) . '.config, ' . $configJs . ');
            </script>
        ');
        $this->controller->addJavascript($this->config['assetsUrl'] . 'ms2/js/mgr/producttabs.panel.js');
        $this->controller->addLastJavascript($this->config['assetsUrl'] . 'ms2/js/mgr/product.common.js');
    }

    /**
     * @param array $tabsIds
     * return void
     */
    private function getProductTabs()
    {
        $query = $this->modx->newQuery($this->productTabFactory->_class);
        if (!empty($this->tabsIds)) {
            $query->where([
                'id:IN' => $this->tabsIds,
            ]);
        }
        $tabsCollection = $this->productTabFactory->loadActiveCollection($query);
        foreach ($tabsCollection as $item) {
            $this->tabs[] = $item->toArray();
        }
    }
}
