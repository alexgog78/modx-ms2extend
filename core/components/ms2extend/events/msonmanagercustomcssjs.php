<?php

class ms2ExtendEventmsOnManagerCustomCssJs extends abstractModuleMgrEvent
{
    /** @var string */
    private $page;

    /** @var modManagerController */
    private $controller;

    /** @var string */
    private $classKey;

    /** @var ms2extendTab */
    private $tabFactory;

    /**
     * ms2ExtendEventmsOnManagerCustomCssJs constructor.
     *
     * @param ms2Extend $service
     * @param string $eventName
     * @param array $scriptProperties
     */
    public function __construct(ms2Extend $service, string $eventName, $scriptProperties = [])
    {
        parent::__construct($service, $eventName, $scriptProperties);
        $this->page = $scriptProperties['page'];
        $this->controller = $scriptProperties['controller'];
    }

    /**
     * @return bool
     */
    protected function checkPermissions()
    {
        if (!in_array($this->page, [
            'product_create',
            'product_update',
            'category_create',
            'category_update',
            'settings',
        ])) {
            return false;
        }
        return parent::checkPermissions();
    }

    protected function run()
    {
        switch ($this->page) {
            case 'product_create':
            case 'product_update':
                $this->classKey = 'ms2extendProductTab';
                break;
            case 'category_create':
            case 'category_update':
                $this->classKey = 'ms2extendCategoryTab';
                break;
            case 'settings':
                $this->classKey = 'ms2extendSettingsTab';
                break;
        }
        $this->tabFactory = $this->modx->newObject($this->classKey);
        $this->tabFactory->extendMgrControllers($this->controller);
    }
}
