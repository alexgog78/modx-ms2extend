<?php

if (!class_exists('amObjectCreateProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/create.class.php';
}

class ms2extProductTabCreateProcessor extends amObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'ms2extProductTab';

    /** @var string */
    public $objectType = 'ms2extend';
}
return 'ms2extProductTabCreateProcessor';