<?php

/**
 * @var modX $modx
 * @var array $scriptProperties
 */

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'ms2extendOnGetProductTabs':
    case 'ms2extendOnGetCategoryTabs':
    case 'ms2extendOnGetSettingsTabs':
        /**
         * @var modManagerController $controller
         * @var modResource $record
         */
        $controller->addJavascript(MODX_ASSETS_URL . 'components/app/minishop2/js/mgr/combo/select.example.js');

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
