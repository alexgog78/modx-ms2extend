<?php

if (!$this->loadClass('remove', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendSettingsTabRemoveProcessor extends amObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extendSettingsTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendSettingsTabRemoveProcessor';
