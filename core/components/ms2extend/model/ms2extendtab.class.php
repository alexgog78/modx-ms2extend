<?php

$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

abstract class ms2extendTab extends abstractSimpleObject
{
    /** @var bool */
    protected $timestamps = false;

    /** @var string */
    protected $eventMgrLayout = 'OnGetProductLayout';

    /** @var string */
    protected $eventMgrGet = 'OnGetProductTabs';

    /** @var string */
    protected $mgrPanel;

    /** @var ms2Extend */
    private $service;

    /**
     * ms2extendTab constructor.
     *
     * @param xPDO $xpdo
     */
    public function __construct(xPDO &$xpdo)
    {
        parent::__construct($xpdo);
        $this->service = $this->xpdo->getService('ms2Extend', 'ms2Extend');
    }

    /**
     * @param modManagerController $controller
     */
    public function extendMgrControllers(modManagerController $controller)
    {
        $controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->service->loadMgrAbstractCssJs($controller);
        $this->service->loadMgrDefaultCssJs($controller);

        $this->service->invokeEvent($this->eventMgrLayout, [
            'controller' => $controller,
        ]);

        $response = $this->service->invokeEvent($this->eventMgrGet, [
            'record' => $this->controller->resource ?? null,
        ]);
        $tabsIds = $response['returnedValues']['tabsIds'] ?? [];
        $tabs = $this->getMgrCollection($tabsIds);

        $configJs = $this->xpdo->toJSON([
            'record_id' => $controller->resource->id ?? null,
            'tabs' => $tabs,
        ]);
        $controller->addHtml('<script type="text/javascript">Ext.applyIf(' . get_class($this->service) . '.config, ' . $configJs . ');</script>');
        $controller->addLastJavascript($this->service->jsUrl . 'mgr/ms2/' . $this->mgrPanel);
    }

    /**
     * @return array
     */
    private function getMgrCollection($ids = [])
    {
        $query = $this->xpdo->newQuery($this->_class);
        $query->where([
            'is_active' => 1,
        ]);
        $query->sortby('menuindex', 'ASC');
        if (!empty($ids)) {
            $query->where([
                'id:IN' => $ids,
            ]);
        }
        $tabs = [];
        $tabsCollection = $this->xpdo->getCollection($this->_class, $query);
        foreach ($tabsCollection as $item) {
            $tabs[] = $item->toArray();
        }
        return $tabs;
    }
}
