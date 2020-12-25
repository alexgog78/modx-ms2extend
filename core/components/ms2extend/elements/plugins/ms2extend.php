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
        $ms2Extend->mgrHandler->extendManagerControllers($controller, $page);
        break;
}
return;
