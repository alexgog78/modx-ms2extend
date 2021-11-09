<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/remove.class.php';

class ms2extendSettingsTabRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendSettingsTab';
}

return 'ms2extendSettingsTabRemoveProcessor';
