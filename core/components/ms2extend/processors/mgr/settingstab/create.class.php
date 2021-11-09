<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/create.class.php';

class ms2extendSettingsTabCreateProcessor extends abstractModuleCreateProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendSettingsTab';
}

return 'ms2extendSettingsTabCreateProcessor';
