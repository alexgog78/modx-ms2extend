<?php

/**
 * @var modX $modx
 * @var buildModel
 */
require_once dirname(__DIR__) . '/modx.php';
require_once dirname(__DIR__) . '/model.class.php';
require_once __DIR__ . '/build.config.php';

$build = new buildModel($modx);
$build->parseSchema(PKG_SCHEMA_PATH, PKG_MODEL_PATH)
    ->createContainers(PKG_NAME, PKG_METADATA_PATH, PKG_MODEL_PATH);

exit();
