<?php

if (!$this->loadClass('update', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendProductTabUpdateProcessor extends amObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'ms2extendProductTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendProductTabUpdateProcessor';
