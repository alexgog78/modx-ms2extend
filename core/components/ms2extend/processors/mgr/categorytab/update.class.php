<?php

if (!$this->loadClass('abstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendCategoryTabUpdateProcessor extends abstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendCategoryTabUpdateProcessor';
