<?php

$this->loadClass('ms2extendTab', dirname(__DIR__) . '/', true, true);

class ms2extendCategoryTab extends ms2extendTab
{
    /** @var string */
    protected $eventMgrLayout = 'OnGetCategoryLayout';

    /** @var string */
    protected $eventMgrGet = 'OnGetCategoryTabs';

    /** @var string */
    protected $mgrPanel = 'panel.category.js';
}
