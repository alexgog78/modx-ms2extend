<?php

/**
 * @var modX $modx
 * @var buildTransport
 */
require_once dirname(__DIR__) . '/modx.php';
require_once dirname(__DIR__) . '/transport.class.php';
require_once __DIR__ . '/build.config.php';

$build = new buildTransport($modx);
$build->createPackage(PKG_NAME_LOWER, PKG_VERSION, PKG_RELEASE)
    ->registerNamespace()
    ->addAttributes([
        'changelog' => file_get_contents(PKG_CORE_PATH . 'docs/changelog.txt'),
        'license' => file_get_contents(PKG_CORE_PATH . 'docs/license.txt'),
        'readme' => file_get_contents(PKG_CORE_PATH . 'docs/readme.txt'),
        'requires' => [
            'php' => '>=7.0',
            'modx' => '>=2.4',
            'miniShop2' => '>=2.4.0',
            'abstractModule' => '>=1.1.0',
        ],
    ])
    ->addCoreFiles('components/' . PKG_NAME_LOWER)
    ->addAssetsFiles('components/' . PKG_NAME_LOWER)
    ->addPlugins(include PKG_BUILD_TRANSPORT_PATH . 'data/plugins.php')
    ->addEvents(include PKG_BUILD_TRANSPORT_PATH . 'data/events.php')
    ->addMenus(include PKG_BUILD_TRANSPORT_PATH . 'data/menus.php')
    ->addCategory(PKG_NAME)
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/database.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/category.php')
    ->pack();
exit();
