<?php

if (!class_exists('amObjectRemoveProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/remove.class.php';
}

class ms2extendCategoryTabRemoveProcessor extends amObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendCategoryTabRemoveProcessor';
