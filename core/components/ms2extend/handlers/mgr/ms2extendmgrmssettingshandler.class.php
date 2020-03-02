<?php

if (!class_exists('ms2ExtendMgrMsHandler')) {
    require_once dirname(__FILE__) . '/ms2extendmgrmshandler.class.php';
}

class ms2ExtendMgrMsSettingsHandler extends ms2ExtendMgrMsHandler
{
    /** @var string */
    protected $objectType = 'ms2extendSettingsTab';

    /** @var string */
    protected $eventLayout = 'ms2extOnGetSettingsLayout';

    /** @var string */
    protected $eventGet = 'ms2extOnGetSettingsTabs';

    /** @var string */
    protected $panel = 'settings.panel.js';
}
