<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/update.class.php';

class ms2extendCategoryTabUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendCategoryTab';
}

return 'ms2extendCategoryTabUpdateProcessor';
