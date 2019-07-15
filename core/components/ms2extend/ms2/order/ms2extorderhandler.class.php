<?php
if (!class_exists('msOrderInterface')) {
	require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/minishop2/model/minishop2/msorderhandler.class.php';
}

class ms2extOrderHandler extends msOrderHandler implements msOrderInterface {
	
}