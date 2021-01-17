<?php

/** @var modX $modx */

/** @var ms2Extend $ms2Extend */
$ms2Extend = $modx->getService('ms2extend', 'ms2Extend', MODX_CORE_PATH . 'components/ms2extend/model/');
if (!($ms2Extend instanceof ms2Extend)) {
    exit('Could not load ms2Extend');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'ms2extendOnGetProductLayout':
    case 'ms2extendOnGetCategoryLayout':
    case 'ms2extendOnGetSettingsLayout':
        /** @var modManagerController $controller */
        $controller->addJavascript($ms2Extend->ms2assetsUrl . 'combo/select.examplez');
        break;
    case 'ms2extendOnGetProductTabs':
    case 'ms2extendOnGetCategoryTabs':
    case 'ms2extendOnGetSettingsTabs':
        /**@var $record */
        $values = &$modx->Event->returnedValues;
        $values['tabsIds'] = [
            1,
            2,
            3,
        ];
        $modx->event->returnedValues = $values;
        break;
}
return;
