<?php

/**
 * @var modX $modx
 * @var array $scriptProperties
 */

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'ms2extendOnGetProductLayout':
    case 'ms2extendOnGetCategoryLayout':
    case 'ms2extendOnGetSettingsLayout':
        /** @var modManagerController $controller */
        $controller->addJavascript(MODX_ASSETS_URL . 'components/app/minishop2/js/mgr/combo/select.example.js');
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
