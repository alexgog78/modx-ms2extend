<?php

$this->loadClass('ms2extendTab', dirname(__DIR__) . '/', true, true);

class ms2extendProductTab extends ms2extendTab
{
    /** @var string */
    protected $eventMgrLayout = 'OnGetProductLayout';

    /** @var string */
    protected $eventMgrGet = 'OnGetProductTabs';

    /** @var string */
    protected $mgrPanel = 'panel.product.js';
}
