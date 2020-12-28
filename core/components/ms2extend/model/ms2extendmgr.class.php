<?php

class ms2ExtendMgr
{
    /** @var ms2Extend */
    private $service;

    /** @var modX */
    private $modx;

    /**
     * ms2ExtendMgr constructor.
     *
     * @param ms2Extend $service
     */
    public function __construct(ms2Extend $service)
    {
        $this->service = $service;
        $this->modx = $service->modx;
    }

    /**
     * @param modManagerController $controller
     * @param string $page
     */
    public function extendManagerControllers(modManagerController $controller, string $page)
    {
        switch ($page) {
            case 'product_create':
            case 'product_update':
                $objectType = 'ms2extendProductTab';
                $eventLayout = 'OnGetProductLayout';
                $eventGet = 'OnGetProductTabs';
                $controller->addLastJavascript($this->service->jsUrl . 'mgr/ms2/panel.product.js');
                break;
            case 'category_create':
            case 'category_update':
                $objectType = 'ms2extendCategoryTab';
                $eventLayout = 'OnGetCategoryLayout';
                $eventGet = 'OnGetCategoryTabs';
                $controller->addLastJavascript($this->service->jsUrl . 'mgr/ms2/panel.category.js');
                break;
            case 'settings':
                $objectType = 'ms2extendSettingsTab';
                $eventLayout = 'OnGetSettingsLayout';
                $eventGet = 'OnGetSettingsTabs';
                $controller->addLastJavascript($this->service->jsUrl . 'mgr/ms2/panel.settings.js');
                break;
            default:
                return;
        }

        $controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->addDefaultAssets($controller);

        $this->service->invokeEvent($eventLayout, [
            'controller' => $controller,
        ]);

        $configJs = $this->modx->toJSON(array_merge($this->service->config, [
            'record_id' => $controller->resource->id ?? null,
            'tabs' => $this->getTabs($objectType, $eventGet),
        ]));
        $controller->addHtml('<script type="text/javascript">' . get_class($this->service) . '.config = ' . $configJs . ';</script>');
    }

    /**
     * @param modManagerController $controller
     */
    private function addDefaultAssets(modManagerController $controller)
    {
        $controller->addJavascript($this->service->jsUrl . 'mgr/' . $this->service::PKG_NAMESPACE . '.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.local.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.local.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.remote.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.remote.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/browser.js');
    }

    /**
     * @param string $objectType
     * @param null $eventGet
     * @return array
     */
    private function getTabs(string $objectType, $eventGet = null)
    {
        $query = $this->modx->newQuery($objectType);
        $query->where([
            'is_active' => 1,
        ]);
        $query->sortby('menuindex', 'ASC');

        if ($eventGet) {
            $response = $this->service->invokeEvent($eventGet, [
                'record' => $controller->resource ?? null,
            ]);
            $tabsIds = $response['returnedValues']['tabsIds'] ?? [];
            if (!empty($tabsIds)) {
                $query->where([
                    'id:IN' => $tabsIds,
                ]);
            }
        }

        $tabs = [];
        $tabsCollection = $this->modx->getCollection($objectType, $query);
        foreach ($tabsCollection as $item) {
            $tabs[] = $item->toArray();
        }
        return $tabs;
    }
}
