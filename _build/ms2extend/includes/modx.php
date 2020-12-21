<?php

define('MODX_API_MODE', true);

/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(__DIR__))) . '/core/model/modx/modx.class.php';

/** modX $modx */
$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');
