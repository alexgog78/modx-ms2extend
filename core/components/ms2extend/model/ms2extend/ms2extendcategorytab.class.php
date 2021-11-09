<?php

$this->loadClass('ms2extendTab', dirname(__DIR__) . '/', true, true);

class ms2extendCategoryTab extends ms2extendTab
{
    /** @var string */
    protected $eventGet = 'OnGetCategoryTabs';

    /** @var string */
    protected $mgrPanel = 'panel.category.js';
}
