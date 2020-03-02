<?php

if (!$this->modx->loadClass('AbstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true)) {
    return false;
}

abstract class ms2ExtendManagerController extends AbstractManagerController
{
    /** @var string\bool */
    protected $moduleClass = 'ms2Extend';
}
