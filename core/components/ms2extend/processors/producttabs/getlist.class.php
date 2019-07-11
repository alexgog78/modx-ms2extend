<?php
require_once MODX_CORE_PATH . 'components/ms2extend/processors/abstract/object/getlist.class.php';

class ms2extProductTabGetListProcessor extends ms2extGetListProcessor {
	public $classKey = 'ms2extProductTab';
	
	
	public function prepareQueryBeforeCount(xPDOQuery $c) {
		//Search
		$query = $this->getProperty('query');
		$valuesqry = $this->getProperty('valuesqry');
		if (!empty($query) && empty($valuesqry)) {
			$c->where(array(
				'name:LIKE' => '%' . $query . '%'
			));
		}
		
		return $c;
	}
}
return 'ms2extProductTabGetListProcessor';