<?php
if (!class_exists('msPaymentInterface')) {
	require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/minishop2/model/minishop2/mspaymenthandler.class.php';
}

class ms2extPaymentHandler extends msPaymentHandler implements msPaymentInterface {
	
}