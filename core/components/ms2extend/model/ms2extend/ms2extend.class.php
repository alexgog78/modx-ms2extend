<?php

class ms2Extend
{
    const PACKAGE = 'ms2extend';

    const HANDLERS = [
        'mgr' => ['mgrLayoutHandler'],
        'default' => []
    ];

    /** @var modX */
    public $modx;

    /** @var array */
    public $config = [];

    /** @var array */
    public $initialized = [];

    /** @var pdoFetch */
    public $pdoTools;

    /**
     * ms2Extend constructor.
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx = &$modx;

        $basePath = $this->modx->getOption(self::PACKAGE . '.core_path', $config, $this->modx->getOption('core_path') . 'components/' . self::PACKAGE . '/');
        $assetsUrl = $this->modx->getOption(self::PACKAGE . '.assets_url', $config, $this->modx->getOption('assets_url') . 'components/' . self::PACKAGE . '/');
        $this->config = array_merge([
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath . 'model/',
            'handlersPath' => $basePath . 'handlers/',
            'processorsPath' => $basePath . 'processors/',
            'templatesPath' => $basePath . 'elements/templates/',
            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'actionUrl' => $assetsUrl . 'action.php'
        ], $config);

        $this->modx->addPackage(self::PACKAGE, $this->config['modelPath']);
        $this->modx->lexicon->load(self::PACKAGE . ':default');

        if ($this->pdoTools = $this->modx->getService('pdoFetch')) {
            $this->pdoTools->setConfig($this->config);
        }
    }

    /**
     * Context initialization
     * @param string $ctx
     * @param array $scriptProperties
     * @return bool
     */
    public function initialize($ctx = 'web', $scriptProperties = [])
    {
        $this->config = array_merge($this->config, $scriptProperties);
        $this->config['ctx'] = $ctx;
        if ($this->initialized[$ctx]) {
            return true;
        }

        $this->addHandlers($ctx);
        switch ($ctx) {
            case 'mgr':
                $this->initializeBackend();
                break;
            default:
                $this->initializeFrontend();
                break;
        }

        $this->initialized[$ctx] = true;
    }

    /**
     * @param string $ctx
     * @return bool
     */
    private function addHandlers($ctx = 'default')
    {
        $handlers = self::HANDLERS[$ctx] ?? self::HANDLERS['default'];
        foreach ($handlers as $className) {
            require_once $this->config['handlersPath'] . mb_strtolower($className) . '.class.php';
            $classNamespace = get_class($this) . '\Handlers\\' . $className;
            $this->$className = new $classNamespace($this, $this->config);
            if (!($this->$className instanceof $classNamespace)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'Could not initialize ' . $classNamespace . ' class');
                return false;
            }
        }
        return true;
    }

    /**
     * @return bool
     */
    public function initializeBackend()
    {
        //Add JS and CSS
        $configJs = $this->modx->toJSON($this->config);
        $this->modx->regClientStartupScript('<script type="text/javascript">ms2ExtendConfig = ' . $configJs . ';</script>', true);
        return true;
    }

    /**
     * @return bool
     */
    public function initializeFrontend()
    {
        //Add JS and CSS
        $configJs = $this->modx->toJSON(array(
            'cssUrl' => $this->config['cssUrl'] . 'web/',
            'jsUrl' => $this->config['jsUrl'] . 'web/',
            'actionUrl' => $this->config['actionUrl']
        ));
        $this->modx->regClientStartupScript('<script type="text/javascript">ms2ExtendConfig = ' . $configJs . ';</script>', true);

        $config = $this->pdoTools->makePlaceholders($this->config);
        if ($frontendCss = $this->modx->getOption('ms2ext_frontend_css')) {
            $this->modx->regClientCSS(str_replace($config['pl'], $config['vl'], $frontendCss));
        }
        if ($frontendJs = $this->modx->getOption('ms2ext_frontend_js')) {
            $this->modx->regClientScript(str_replace($config['pl'], $config['vl'], $frontendJs));
        }
        return true;
    }
}