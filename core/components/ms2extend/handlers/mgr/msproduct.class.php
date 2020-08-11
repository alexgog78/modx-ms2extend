<?php

class ms2ExtendHandlerMgrMsProduct extends AbstractHandlerMgr
{
    /** @var string */
    protected $objectType = 'ms2extendProductTab';

    /** @var string */
    protected $eventLayout = 'ms2extOnGetProductLayout';

    /** @var string */
    protected $eventGet = 'ms2extOnGetProductTabs';

    /** @var string */
    protected $panel = 'product.panel.js';

    /** @var xPDOObject */
    private $object;

    /** @var array */
    private $tabsIds = [];

    /** @var array */
    private $tabs = [];

    public function __construct(AbstractModule $module)
    {
        parent::__construct($module);
        $this->object = $this->modx->newObject($this->objectType);
    }


    public function run()
    {
        $this->module->log('ms2ExtendHandlerMgrMsCategory');
    }

    /**
     * @param modManagerController $controller
     */
    public function loadAssets(modManagerController $controller)
    {
        $this->addLexicon($controller);

        $this->config = $this->module->config;


        $this->getTabs($controller);
        parent::loadAssets($controller);
        $this->module->invokeEvent($this->eventLayout, [
            'controller' => $controller,
        ]);
        $controller->addLastJavascript($this->module->jsUrl . 'mgr/ms2/' . $this->panel);
    }

    /**
     * @param modManagerController $controller
     */
    public function addLexicon(modManagerController $controller)
    {
        $controller->addLexiconTopic($this->module->namespace . ':default');
    }

    /**
     * @param modManagerController $controller
     */
    private function getTabs(modManagerController $controller)
    {
        if ($this->eventGet) {
            $response = $this->module->invokeEvent($this->eventGet, [
                'record' => $controller->resource,
            ]);
            $this->tabsIds = $response['returnedValues']['tabsIds'] ?? [];
        }
        $query = $this->modx->newQuery($this->object->_class);
        if (!empty($this->tabsIds)) {
            $query->where([
                'id:IN' => $this->tabsIds,
            ]);
        }
        $tabsCollection = $this->object->loadActiveCollection($query);
        foreach ($tabsCollection as $item) {
            $this->tabs[] = $item->toArray();
        }
        $this->config = array_merge($this->config, [
            'recordId' => $controller->resource->id ?? null,
            'tabs' => $this->tabs,
        ]);
    }
}
