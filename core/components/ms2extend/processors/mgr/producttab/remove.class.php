<?php

if (!$this->loadClass('abstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendProductTabRemoveProcessor extends abstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2extendProductTab';

    /** @var string */
    public $objectType = 'ms2extend';
}

return 'ms2extendProductTabRemoveProcessor';
