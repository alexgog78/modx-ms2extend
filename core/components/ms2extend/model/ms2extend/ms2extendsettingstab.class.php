<?php

$this->loadClass('ms2extendTab', dirname(__DIR__) . '/', true, true);

class ms2extendSettingsTab extends ms2extendTab
{
    /** @var string */
    protected $eventMgrLayout = 'OnGetSettingsLayout';

    /** @var string */
    protected $eventMgrGet = 'OnGetSettingsTabs';

    /** @var string */
    protected $mgrPanel = 'panel.settings.js';
}
