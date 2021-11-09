<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/remove.class.php';

class ms2extendProductTabRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendProductTab';
}

return 'ms2extendProductTabRemoveProcessor';
