<?php

if (!class_exists('amObjectUpdateProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/update.class.php';
}

class ms2extProductTabUpdateProcessor extends amObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'ms2extProductTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extProductTabUpdateProcessor';