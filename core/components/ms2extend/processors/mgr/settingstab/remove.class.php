<?php

require_once dirname(__DIR__) . '/remove.class.php';

class ms2extendSettingsTabRemoveProcessor extends ms2ExtendRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extendSettingsTab';
}

return 'ms2extendSettingsTabRemoveProcessor';
