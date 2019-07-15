<?php
class ms2Extend {
	public $modx;
	public $config = array();
	public $initialized = array();
	public $mgrLayoutHandler;


	function __construct(modX &$modx, array $config = array()) {
		$this->modx = & $modx;

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
	}
	
	
	//Context initialization
	public function initialize($ctx = 'web', $scriptProperties = array()) {
		$this->config = array_merge($this->config, $scriptProperties);
		$this->config['ctx'] = $ctx;
		if ($this->initialized[$ctx]) {
			return true;
		}
		
		//Add JS and CSS
		switch($ctx){
			case 'mgr':
				if($this->modx->controller){
					$this->modx->controller->addHtml('
						<script type="text/javascript">
							ms2Extend = {};
							ms2Extend.config = ' . $this->modx->toJSON($this->config) . ';
						</script>'
					);
				}
			break;
			default:
				$config_js = preg_replace(array('/^\n/', '/\t{5}/'), '', '
					ms2ExtendConfig = {};
					ms2ExtendConfig = {
						cssUrl: "'.$this->config['cssUrl'] . 'web/",
						jsUrl: "'.$this->config['jsUrl'] . 'web/",
						actionUrl: "'.$this->config['actionUrl'].'"
					};');
				$this->modx->regClientStartupScript("<script type=\"text/javascript\">\n" . $config_js . "\n</script>", true);
				
				$config = $this->makePlaceholders($this->config);
				if ($css = $this->modx->getOption('ms2ext_frontend_css')) {
					$this->modx->regClientCSS(str_replace($config['placeholder'], $config['value'], $css));
				}
				if ($js = $this->modx->getOption('ms2ext_frontend_js')) {
					$this->modx->regClientScript(str_replace($config['placeholder'], $config['value'], $js));
				}
			break;
		}
		
		//MGR layout handler
		require_once dirname(dirname(__FILE__)) . '/handlers/mgrlayouthandler.class.php';
		$this->mgrLayoutHandler = new ms2extMgrLayoutHandler($this, $this->config);
		if (!($this->mgrLayoutHandler instanceof ms2extMgrLayoutHandler)) {
			$this->modx->log(modX::LOG_LEVEL_ERROR, 'Could not initialize ms2extMgrLayoutHandler class');
			return false;
		}
		
		$this->initialized[$ctx] = true;
	}
	
	
	//Creating placeholders array
	public function makePlaceholders(array $array = array()) {
		$result = array('placeholder' => array(), 'value' => array());
		foreach ($array as $key=>$value) {
			if (is_array($value)) {
				$result = array_merge_recursive($result, $this->makePlaceholders($value, $key . '.'));
			} else {
				$result['placeholder'][$key] = '[[+'.$key.']]';
				$result['value'][$key] = $value;
			}
		}
		return $result;
	}
}