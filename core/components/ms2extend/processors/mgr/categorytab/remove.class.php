<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class ms2extendCategoryTabRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendCategoryTab';
}

return 'ms2extendCategoryTabRemoveProcessor';
