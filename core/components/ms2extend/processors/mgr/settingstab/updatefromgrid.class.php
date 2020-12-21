<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class ms2extendSettingsTabUpdateFromGridProcessor extends ms2extendSettingsTabUpdateProcessor
{
    use ms2ExtendProcessorHelperGridUpdate;
}

return 'ms2extendSettingsTabUpdateFromGridProcessor';
