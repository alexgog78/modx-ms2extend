<?php
/** @var modX $modx */
/** @var ms2Extend $ms2Extend */
$ms2Extend = $modx->getService('ms2extend', 'ms2Extend', $modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/', array());
$ms2Extend->initialize($modx->context->key, array());
if (!($ms2Extend instanceof ms2Extend)) {
    exit('Could not initialize ms2Extend');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'OnWebPageInit':
        break;
    case 'msOnManagerCustomCssJs':
        //Product form extend
        if (in_array($page, array('product_create', 'product_update'))) {
            $ms2Extend->mgrLayoutHandler->getProductLayout($controller->resource, []);
        }
        break;
}
return;