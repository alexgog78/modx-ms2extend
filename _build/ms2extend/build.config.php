<?php

define('PKG_NAME', 'ms2Extend');
define('PKG_NAME_LOWER', strtolower(PKG_NAME));
define('PKG_PATH', MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/');
define('DB_TYPE', $modx->getOption('dbtype'));
define('PKG_MODEL_PATH', PKG_PATH . 'model/');
define('PKG_SCHEMA_PATH', PKG_PATH . 'model/schema/' . PKG_NAME_LOWER . '.' . DB_TYPE . '.schema.xml');
