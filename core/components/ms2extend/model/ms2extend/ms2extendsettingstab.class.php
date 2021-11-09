<?php

$this->loadClass('ms2extendTab', dirname(__DIR__) . '/', true, true);

class ms2extendSettingsTab extends ms2extendTab
{
    /** @var string */
    protected $eventGet = 'OnGetSettingsTabs';

    /** @var string */
    protected $mgrPanel = 'panel.settings.js';
}
