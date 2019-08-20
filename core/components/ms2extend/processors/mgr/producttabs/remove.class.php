<?php

if (!class_exists('amObjectRemoveProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/remove.class.php';
}

class ms2extProductTabRemoveProcessor extends amObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extProductTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extProductTabRemoveProcessor'; 