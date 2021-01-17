<?php

$this->loadClass('abstractModule', MODX_CORE_PATH . 'components/abstractmodule/model/', true, true);

class ms2Extend extends abstractModule
{
    const PKG_VERSION = '1.1.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'ms2extend';
    const TABLE_PREFIX = 'ms2extend_';
    const DEVELOPER_MODE = true;

    /**
     * @param array $config
     */
    protected function setConfig($config = [])
    {
        parent::setConfig($config);
        $this->config['ms2assetsUrl'] = $this->assetsUrl . 'ms2/';
    }
}
