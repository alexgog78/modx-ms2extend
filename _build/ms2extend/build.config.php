<?php

define('PKG_NAME', 'ms2Extend');
define('PKG_NAME_LOWER', strtolower(PKG_NAME));

define('PKG_VERSION', '1.2.0');
define('PKG_RELEASE', 'beta');
define('DB_TYPE', 'mysql');
define('PKG_CORE_PATH', MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/');
define('PKG_ASSETS_PATH', MODX_ASSETS_PATH . 'components/' . PKG_NAME_LOWER . '/');
define('PKG_MODEL_PATH', PKG_CORE_PATH . 'model/');
define('PKG_SCHEMA_PATH', PKG_CORE_PATH . 'model/schema/' . PKG_NAME_LOWER . '.' . DB_TYPE . '.schema.xml');
define('PKG_METADATA_PATH', PKG_MODEL_PATH . PKG_NAME_LOWER . '/metadata.' . DB_TYPE . '.php');
define('PKG_ELEMENTS_PATH', PKG_CORE_PATH . 'elements/');

define('PKG_BUILD_PATH', __DIR__ . '/');
define('PKG_BUILD_TRANSPORT_PATH', PKG_BUILD_PATH . 'transport/');
