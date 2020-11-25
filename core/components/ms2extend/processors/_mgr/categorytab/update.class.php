<?php

if (!$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendCategoryTabUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendCategoryTabUpdateProcessor';
