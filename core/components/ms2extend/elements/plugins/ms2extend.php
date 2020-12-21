<?php

/** @var modX $modx */

/** @var ms2Extend $ms2Extend */
$ms2Extend = $modx->getService('ms2extend', 'ms2Extend', MODX_CORE_PATH . 'components/ms2extend/model/');
if (!($ms2Extend instanceof ms2Extend)) {
    exit('Could not load ms2Extend');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'msOnManagerCustomCssJs':
        /**
         * @var modManagerController $controller
         * @var $page
         */
        if (in_array($page, [
            'product_create',
            'product_update',
        ])) {
            //$ms2Extend->mgrMsProduct->addLexicon($controller);
            //$ms2Extend->mgrMsProduct->loadAssets($controller);
        }
        if (in_array($page, [
            'category_create',
            'category_update',
        ])) {
            //$ms2Extend->log($page);
            //$ms2Extend->zzz;
            //$ms2Extend->mgrMsCategory->run();
            //$ms2Extend->mgrMsCategory->loadAssets($controller);

            //$ms2Extend->mgrMsCategory->addLexicon($controller);
            //$ms2Extend->mgrMsCategory->loadAssets($controller);
        }
        if (in_array($page, [
            'settings',
        ])) {
            //$ms2Extend->mgrMsSettings->addLexicon($controller);
            //$ms2Extend->mgrMsSettings->loadAssets($controller);
        }
        break;
}
return;
