<?php
require_once dirname(__FILE__) . '/model/ms2extend/ms2extend.class.php';


abstract class ms2ExtendManagerController extends modExtraManagerController {
	public $ms2extend;
	
	
	public function initialize() {
		$this->ms2extend = new ms2Extend($this->modx);
		
		//Base JS and CSS
		$this->addCss($this->ms2extend->config['cssUrl'] . 'mgr/default.css');
		$this->addJavascript($this->ms2extend->config['jsUrl'] . 'mgr/ms2extend.js');
		$this->addJavascript($this->ms2extend->config['jsUrl'] . 'mgr/misc/renderer.list.js');
		$this->addJavascript($this->ms2extend->config['jsUrl'] . 'mgr/misc/combo.list.js');
		$this->addJavascript($this->ms2extend->config['jsUrl'] . 'mgr/misc/function.list.js');
		$this->addHtml('
			<script type="text/javascript">
				Ext.onReady(function(){
					ms2Extend.config = ' . $this->modx->toJSON($this->ms2extend->config) . ';
				});
			</script>'
		);
		
		return parent::initialize();
	}
	
	
	public function getLanguageTopics() {
		return array('ms2extend:default');
	}
	
	
	public function checkPermissions() {
		return true;
	}
}


class IndexManagerController extends ms2ExtendManagerController {
	public static function getDefaultController() {
		return 'mgr/producttabs';
	}
}