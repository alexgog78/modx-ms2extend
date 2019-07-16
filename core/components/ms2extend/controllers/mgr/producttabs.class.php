<?php
require_once dirname(dirname(dirname(__FILE__))) . '/index.class.php';


class ControllersProductTabsManagerController extends ms2ExtendManagerController {
	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'producttabs';
	}
}


class ms2ExtendProductTabsManagerController extends ms2ExtendManagerController {
	/**
	 * @return mixed
	 */
	public function getPageTitle(){
		return $this->modx->lexicon('ms2ext.section.product-tabs');
	}

	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->ms2extend->config['templatesPath'] . 'product-tabs.tpl';
	}

	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
		
	}

	public function loadCustomCssJs() {
		$this->addLastJavascript($this->ms2extend->config['jsUrl'] . 'mgr/sections/product.tabs.panel.js');
		$this->addJavascript($this->ms2extend->config['jsUrl'] . 'mgr/widgets/product.tabs.grid.js');
	}
}


class ControllersMs2ExtendManagerController extends ControllersProductTabsManagerController {
	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'mgr/tabs';
	}
}


class ms2ExtendMgrProductTabsManagerController extends ms2ExtendProductTabsManagerController {
	
}