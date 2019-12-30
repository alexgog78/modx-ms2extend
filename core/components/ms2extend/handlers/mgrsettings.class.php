<?php

if (!class_exists('amHandler')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/handlers/handler.class.php';
}

class ms2ExtendMgrSettings extends amHandler
{
    /** @var ms2extendSettingsTab */
    private $object;

    /** @var modManagerController */
    private $controller;

    /** @var array */
    private $tabs = [];

    /**
     * ms2ExtendMgrSettings constructor
     * @param ms2Extend $module
     * @param array $config
     */
    public function __construct(& $module, array $config = [])
    {
        parent::__construct($module, $config);
        $this->object = $this->modx->newObject('ms2extendSettingsTab');
    }

    /**
     * @param modManagerController $controller
     */
    public function getLayout(modManagerController $controller)
    {
        $this->controller = $controller;
        $this->module->invokeEvent('ms2extOnGetSettingsLayout', [
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
        $tabsCollection = $this->object->loadActiveCollection();
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
            'settingsTabs' => $this->tabs,
        ]);
        $this->controller->addHtml('
            <script type="text/javascript">
                Ext.apply(' . get_class($this->module) . '.config, ' . $configJs . ');
            </script>
        ');
        $this->controller->addLastJavascript($this->config['ms2JsUrl'] . 'mgr/extend/settings.panel.js');
    }
}
