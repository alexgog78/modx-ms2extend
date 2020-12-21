<?php

trait ms2ExtendControllerHelperService
{
    /** @var ms2Extend */
    protected $service;

    /**
     * @return object|null
     */
    protected function getService()
    {
        return $this->modx->getService($this->namespace, $this->namespace, $this->namespace_path . '/model/');
    }
}
