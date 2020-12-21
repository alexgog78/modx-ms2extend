<?php

require_once __DIR__ . '/includes/modx.php';
require_once __DIR__ . '/build.config.php';


/**
 * @var modX $modx
 * @var xPDOManager $manager
 */
$manager = $modx->getManager();
$generator = $modx->manager->getGenerator();


/**
 * Generate model files
 */
$status = $generator->parseSchema(PKG_SCHEMA_PATH, PKG_MODEL_PATH);
if (!$status) {
    Helpers::log('Error generating model');
    exit();
}


/**
 * Create DB tables
 */
$service = $modx->getService(PKG_NAME_LOWER, PKG_NAME, PKG_MODEL_PATH);
$mapFile = $service->modelPath . $service::PKG_NAMESPACE . '/metadata.' . DB_TYPE . '.php';
/**
 * @noinspection PhpIncludeInspection
 * @var $xpdo_meta_map
 */
include $mapFile;
foreach ($xpdo_meta_map as $baseClass => $extends) {
    foreach ($extends as $className) {
        $manager->createObjectContainer($className);
    }
}


exit();
