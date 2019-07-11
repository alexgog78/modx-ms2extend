<?php
class ms2extMgrLayoutHandler {
	private $ms2ext;
	private $config = array();
	private $modx;
	
	
	function __construct(ms2Extend & $ms2Extend, array $config = array()) {
		$this->ms2ext = & $ms2Extend;
		$this->config = $config;
		$this->modx = & $ms2Extend->modx;
	}
	
	
	public function getProductLayout($tabsIds = array()) {
		$query = $this->modx->newQuery('ms2extProductTab');
		$query->select($this->modx->getSelectColumns('ms2extProductTab', 'ms2extProductTab', ''));
		
		if (!empty($tabsIds)) {
			$query->where(array(
				'id:IN' => $tabsIds
			));
		}

		$query->prepare();
		$query->stmt->execute();
		$mas = $query->stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($mas as $item) {
			$item['fields'] = explode(',', $item['fields']);
			$tabs[] = $item;
		}
		
		$configJs .=  preg_replace(array('/^\n/', '/\t{5}/'), '', '
			ms2Extend.tabs = '.$this->modx->toJSON($tabs).';
		');
		$this->modx->controller->addHtml('<script type="text/javascript">' . $configJs . '</script>');
		$this->modx->controller->addLastJavascript($this->config['jsUrl'] . 'mgr/extend/product/product.common.js');
	}
}