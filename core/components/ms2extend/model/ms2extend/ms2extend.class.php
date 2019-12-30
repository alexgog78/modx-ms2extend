<?php

if (!class_exists('abstractModule')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class ms2Extend extends abstractModule
{
    /** @var array */
    public $handlers = [
        'mgr' => [
            'mgrCategory' => 'ms2ExtendMgrCategory',
            'mgrProduct' => 'ms2ExtendMgrProduct',
            'mgrSettings' => 'ms2ExtendMgrSettings',
        ],
        'default' => [],
    ];

    /** @var string|null */
    protected $tablePrefix = 'ms2extend_';

    public function __construct(modX &$modx, array $config = [])
    {
        parent::__construct($modx, $config);
        $this->config['ms2JsUrl'] = $this->config['assetsUrl'] . 'ms2/js/';
        $this->config['ms2ConnectorUrl'] = $this->config['assetsUrl'] . 'ms2/connector.php';
        $this->config['ms2ProcessorsPath'] = $this->config['basePath'] . 'ms2/processors/';
    }

    /**
     * @param modManagerController $controller
     * @return bool
     */
    public function addBackendAssets(modManagerController $controller)
    {
        parent::addBackendAssets($controller);
        $controller->addCss($this->config['cssUrl'] . 'mgr/default.css');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/' . $this->objectType . '.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/field.multiselect.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/xtype.multiselect.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/browser.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.indevelopment.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.undefined.js');
        return true;
    }
}
