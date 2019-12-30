<?php

if (!class_exists('amObjectRemoveProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/remove.class.php';
}

class ms2extendSettingsTabRemoveProcessor extends amObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extendSettingsTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendSettingsTabRemoveProcessor';
