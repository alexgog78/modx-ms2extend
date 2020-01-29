<?php

if (!class_exists('ms2ExtendMgrMsHandler')) {
    require_once dirname(__FILE__) . '/ms.class.php';
}

class ms2ExtendMgrMsProductHandler extends ms2ExtendMgrMsHandler
{
    /** @var string */
    protected $objectType = 'ms2extendProductTab';

    /** @var string */
    protected $eventLayout = 'ms2extOnGetProductLayout';

    /** @var string */
    protected $eventGet = 'ms2extOnGetProductTabs';

    /** @var string */
    protected $panel = 'mgr/extend/product.panel.js';
}
