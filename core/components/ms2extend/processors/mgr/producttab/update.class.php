<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/update.class.php';

class ms2extendProductTabUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendProductTab';
}

return 'ms2extendProductTabUpdateProcessor';
