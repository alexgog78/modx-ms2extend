<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class ms2extendProductTabUpdateFromGridProcessor extends ms2extendProductTabUpdateProcessor
{
    use ms2ExtendProcessorHelperGridUpdate;
}

return 'ms2extendProductTabUpdateFromGridProcessor';
