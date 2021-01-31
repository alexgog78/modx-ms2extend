<?php

/**
 * @var modX $modx
 */
require_once dirname(__DIR__) . '/modx.php';
require_once __DIR__ . '/build.config.php';

/**
 * @var modPackageBuilder $builder
 */
$builder = $modx->loadClass('transport.modPackageBuilder', '', false, true);
$builder = new modPackageBuilder($modx);

/**
 * @var ms2Extend $service
 */
$service = $modx->getService(PKG_NAME_LOWER, PKG_NAME, PKG_MODEL_PATH);

/** Creating package */
require_once PKG_BUILD_TRANSPORT_PATH . 'package.inc.php';

/** Files */
require_once PKG_BUILD_TRANSPORT_PATH . 'files.inc.php';

/** modMenu */
require_once PKG_BUILD_TRANSPORT_PATH . 'menus.inc.php';

/** modPlugin */
require_once PKG_BUILD_TRANSPORT_PATH . 'plugins.inc.php';

/** modEvent */
require_once PKG_BUILD_TRANSPORT_PATH . 'events.inc.php';

/** modCategory */
require_once PKG_BUILD_TRANSPORT_PATH . 'category.inc.php';

/** Resolvers */
require_once PKG_BUILD_TRANSPORT_PATH . 'resolvers.inc.php';

/** Create .zip file */
$builder->pack();
$modx->log(modX::LOG_LEVEL_INFO, 'Package transport  zip created');

exit();
