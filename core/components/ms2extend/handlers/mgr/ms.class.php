<?php

if (!class_exists('ms2ExtendMgrBaseHandler')) {
    require_once dirname(__FILE__) . '/base.class.php';
}

abstract class ms2ExtendMgrMsHandler extends ms2ExtendMgrBaseHandler
{
    /** @var string */
    protected $objectType;

    /** @var string */
    protected $eventLayout;

    /** @var string */
    protected $eventGet;

    /** @var string */
    protected $panel = '';

    /** @var xPDOObject */
    private $object;

    /** @var array */
    private $tabsIds = [];

    /** @var array */
    private $tabs = [];

    /**
     * ms2ExtendMgrLayout constructor.
     * @param $module
     * @param array $config
     */
    public function __construct(& $module, array $config = [])
    {
        parent::__construct($module, $config);
        $this->object = $this->modx->newObject($this->objectType);
    }

    /**
     * @param modManagerController $controller
     */
    public function loadAssets(modManagerController $controller)
    {
        $this->getTabs($controller);
        parent::loadAssets($controller);
        $this->module->invokeEvent($this->eventLayout, [
            'controller' => $controller,
        ]);
        $controller->addLastJavascript($this->config['ms2JsUrl'] . $this->panel);
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
