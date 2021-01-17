<?php

/**
 * @var modX $modx
 */
require_once dirname(__DIR__) . '/modx.php';
require_once __DIR__ . '/build.config.php';

/**
 * @var xPDOManager $manager
 */
$manager = $modx->getManager();
$generator = $modx->manager->getGenerator();

/**
 * Generate model files
 */
require_once __DIR__ . '/model/schema.inc.php';

/**
 * Create DB tables
 */
require_once __DIR__ . '/model/db.inc.php';

exit();
