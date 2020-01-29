<?php

if (!class_exists('ms2ExtendMgrMsHandler')) {
    require_once dirname(__FILE__) . '/ms.class.php';
}

class ms2ExtendMgrMsCategoryHandler extends ms2ExtendMgrMsHandler
{
    /** @var string */
    protected $objectType = 'ms2extendCategoryTab';

    /** @var string */
    protected $eventLayout = 'ms2extOnGetCategoryLayout';

    /** @var string */
    protected $eventGet = 'ms2extOnGetCategoryTabs';

    /** @var string */
    protected $panel = 'mgr/extend/category.panel.js';
}
