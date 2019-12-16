<?php

/** @var modX $modx */

/** @var ms2Extend $ms2Extend */
$ms2Extend = $modx->getService('ms2extend', 'ms2Extend', $modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/', []);
$ms2Extend->initialize($modx->context->key, []);
if (!($ms2Extend instanceof ms2Extend)) {
    exit('Could not initialize ms2Extend');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'OnWebPageInit':
        break;
    case 'msOnManagerCustomCssJs':
        /** @var modManagerController $controller */
        /** @var $page */
        if (in_array($page, [
            'product_create',
            'product_update',
        ])) {
            if (!$ms2Extend->mgrProduct) {
                return;
            }
            $ms2Extend->mgrProduct->getProductLayout($controller);
        }
        break;
    case 'ms2extOnGetProductLayout':
        /** @var modManagerController $controller */
        break;
    case 'ms2extOnGetProductTabs':
        /** @var $resource */
        break;
}
return;
