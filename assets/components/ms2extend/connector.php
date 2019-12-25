<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption(
    'ms2extend.core_path',
    null,
    $modx->getOption('core_path') . 'components/ms2extend/'
);
require_once $corePath . 'model/ms2extend/ms2extend.class.php';
$modx->ms2extend = new ms2Extend($modx);
$modx->lexicon->load('ms2extend:default');

$path = $modx->getOption('processorsPath', $modx->ms2extend->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => ''
));
