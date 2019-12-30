<?php

if (!class_exists('amHandler')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/handlers/handler.class.php';
}

class ms2ExtendMgrProduct extends amHandler
{
    /** @var ms2extendProductTab */
    private $object;

    /** @var modManagerController */
    private $controller;

    /** @var array */
    private $tabs = [];

    /**
     * ms2Extend constructor.
     * @param ms2Extend $module
     * @param array $config
     */
    public function __construct(& $module, array $config = [])
    {
        parent::__construct($module, $config);
        $this->object = $this->modx->newObject('ms2extendProductTab');
    }

    /**
     * @param modManagerController $controller
     */
    public function getLayout(modManagerController $controller)
    {
        $this->controller = $controller;
        $this->module->invokeEvent('ms2extOnGetProductLayout', [
            'controller' => $this->controller,
        ]);
        $this->module->addLexicon($this->controller);
        $this->getTabs();
        $this->loadAssets();
    }

    /**
     * return void
     */
    private function getTabs()
    {
        $response = $this->module->invokeEvent('ms2extOnGetProductTabs', [
            'resource' => $this->controller->resource,
        ]);
        $tabsIds = $response['returnedValues']['tabsIds'] ?? [];

        $query = $this->modx->newQuery($this->object->_class);
        //TODO check
        if (!empty($tabsIds)) {
            $query->where([
                'id:IN' => $tabsIds,
            ]);
        }
        $tabsCollection = $this->object->loadActiveCollection($query);
        foreach ($tabsCollection as $item) {
            $this->tabs[] = $item->toArray();
        }
    }

    /**
     * return void
     */
    private function loadAssets()
    {
        $configJs = $this->modx->toJSON([
            'recordId' => $this->controller->resource->id,
            'productTabs' => $this->tabs,
        ]);
        $this->controller->addHtml('
            <script type="text/javascript">
                Ext.apply(' . get_class($this->module) . '.config, ' . $configJs . ');
            </script>
        ');
        //$this->controller->addJavascript($this->config['assetsUrl'] . 'ms2/js/mgr/producttabs.panel.js');
        //$this->controller->addLastJavascript($this->config['assetsUrl'] . 'ms2/js/mgr/product.common.js');
        $this->controller->addLastJavascript($this->config['ms2JsUrl'] . 'mgr/extend/product.panel.js');
    }
}
