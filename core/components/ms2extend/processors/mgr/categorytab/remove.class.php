<?php

if (!$this->loadClass('remove', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendCategoryTabRemoveProcessor extends amObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendCategoryTabRemoveProcessor';
