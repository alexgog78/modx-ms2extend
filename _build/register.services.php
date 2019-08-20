<?php
$tstart = explode(' ', microtime());
$tstart = $tstart[1] + $tstart[0];
set_time_limit(0);


require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');
if (!$miniShop2 = $modx->getService('miniShop2')) {
    die('Could not initialize miniShop2');
}


//Add plugins
/*$miniShop2->addPlugin(
    'ms2extProduct',
    '{core_path}components/' . PKG_NAME_LOWER . '/ms2/plugins/product/index.php'
);*/


//Add services
$miniShop2->addService(
    'cart',
    'ms2extCartHandler',
    '{core_path}components/' . PKG_NAME_LOWER . '/ms2/cart/ms2extcarthandler.class.php'
);
$miniShop2->addService(
    'order',
    'ms2extOrderHandler',
    '{core_path}components/' . PKG_NAME_LOWER . '/ms2/order/ms2extorderhandler.class.php'
);
$miniShop2->addService(
    'delivery',
    'ms2extDeliveryHandler',
    '{core_path}components/' . PKG_NAME_LOWER . '/ms2/delivery/ms2extdeliveryhandler.class.php'
);
$miniShop2->addService(
    'payment',
    'ms2extPaymentHandler',
    '{core_path}components/' . PKG_NAME_LOWER . '/ms2/payment/ms2extpaymenthandler.class.php'
);


$tend = explode(" ", microtime());
$tend = $tend[1] + $tend[0];
$totalTime = sprintf("%2 . 4f s", ($tend - $tstart));
$modx->log(modX::LOG_LEVEL_INFO, '<br>Built.<br>Execution time: {' . $totalTime . '}');
exit();