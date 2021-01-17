<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/update.class.php';

class ms2extendSettingsTabUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendSettingsTab';
}

return 'ms2extendSettingsTabUpdateProcessor';
