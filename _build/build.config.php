<?php
$packageName = 'ms2Extend';
$basePath = dirname(dirname(__FILE__));

define('PKG_NAME', $packageName);
define('PKG_NAME_LOWER', mb_strtolower($packageName));
define('PKG_VERSION', '1.0');
define('PKG_RELEASE', 'rc1');
	
define('MODX_BASE_PATH', $basePath);
define('MODX_CORE_PATH', MODX_BASE_PATH . 'core/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');
 
define('MODX_BASE_URL', '/');
define('MODX_CORE_URL', MODX_BASE_URL . 'core/');
define('MODX_MANAGER_URL', MODX_BASE_URL . 'manager/');
define('MODX_CONNECTORS_URL', MODX_BASE_URL . 'connectors/');
define('MODX_ASSETS_URL', MODX_BASE_URL . 'assets/');