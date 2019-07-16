<?php

class ms2Extend
{
    /**
     * @var modX
     */
    public $modx;

    /**
     * @var array
     */
    public $config = array();

    /**
     * @var pdoFetch
     */
    public $pdoTools;

    /**
     * @var array
     */
    public $initialized = array();

    /**
     * @var ms2extMgrLayoutHandler
     */
    public $mgrLayoutHandler;


    /**
     * ms2Extend constructor.
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx = &$modx;

        $basePath = $this->modx->getOption('ms2extend.core_path', $config, $this->modx->getOption('core_path') . 'components/ms2extend/');
        $assetsUrl = $this->modx->getOption('ms2extend.assets_url', $config, $this->modx->getOption('assets_url') . 'components/ms2extend/');
        $this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath . 'model/',
            'processorsPath' => $basePath . 'processors/',
            'templatesPath' => $basePath . 'elements/templates/',
            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'actionUrl' => $assetsUrl . 'action.php'
        ), $config);

        $this->modx->addPackage('ms2extend', $this->config['modelPath']);
        $this->modx->lexicon->load('ms2extend:default');

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
    public function initialize($ctx = 'web', $scriptProperties = array())
    {
        $this->config = array_merge($this->config, $scriptProperties);
        $this->config['ctx'] = $ctx;
        if ($this->initialized[$ctx]) {
            return true;
        }

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
     * @return bool
     */
    public function initializeBackend()
    {
        //Add JS and CSS
        if ($this->modx->controller) {
            $this->modx->controller->addHtml('
				<script type="text/javascript">
					ms2Extend = {};
					ms2Extend.config = ' . $this->modx->toJSON($this->config) . ';
				</script>'
            );
        }

        //MGR layout handler
        require_once dirname(dirname(__FILE__)) . '/handlers/mgrlayouthandler.class.php';
        $this->mgrLayoutHandler = new ms2extMgrLayoutHandler($this, $this->config);
        if (!($this->mgrLayoutHandler instanceof ms2extMgrLayoutHandler)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Could not initialize ms2extMgrLayoutHandler class');
            return false;
        }
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