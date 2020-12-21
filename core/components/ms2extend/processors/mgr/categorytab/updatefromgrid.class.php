<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class ms2extendCategoryTabUpdateFromGridProcessor extends ms2extendCategoryTabUpdateProcessor
{
    use ms2ExtendProcessorHelperGridUpdate;
}

return 'ms2extendCategoryTabUpdateFromGridProcessor';
