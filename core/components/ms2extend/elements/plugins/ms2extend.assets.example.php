<?php

//TODO

/** @noinspection PhpUndefinedVariableInspection */
/** @var modX $modx */

/** @var ms2Extend $ms2Extend */
$ms2Extend = $modx->getService('ms2extend', 'ms2Extend', $modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/', [
    'ctx' => $modx->context->key,
]);
if (!($ms2Extend instanceof ms2Extend)) {
    exit('Could not load ms2Extend');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'ms2extOnGetProductLayout':
        /** @var modManagerController $controller */
        $controller->addJavascript($ms2Extend->config['ms2JsUrl'] . 'example.js');
        break;
    case 'ms2extOnGetCategoryLayout':
        /** @var modManagerController $controller */
        $controller->addJavascript($ms2Extend->config['ms2JsUrl'] . 'example.js');
        break;
    case 'ms2extOnGetSettingsLayout':
        /** @var modManagerController $controller */
        $controller->addJavascript($ms2Extend->config['ms2JsUrl'] . 'example.js');
        break;
    case 'ms2extOnGetProductTabs':
        /** @var $resource */
        //tabsIds
        break;
    case 'ms2extOnGetCategoryTabs':
        /** @var $resource */
        //tabsIds
        break;
    case 'ms2extOnGetSettingsTabs':
        /** @var $resource */
        //tabsIds
        break;
}
return;
