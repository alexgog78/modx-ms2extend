<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/create.class.php';

class ms2extendCategoryTabCreateProcessor extends abstractModuleCreateProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendCategoryTab';
}

return 'ms2extendCategoryTabCreateProcessor';
