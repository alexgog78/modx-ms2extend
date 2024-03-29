<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/default.class.php';

class ms2ExtendMgrTabsManagerController extends abstractModuleMgrDefaultController
{
    /** @var string */
    protected $pageTitle = 'tabs';

    /** @var array */
    protected $languageTopics = [
        'ms2extend:tab',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/panel.tabs.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/grid.producttab.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/window.producttab.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/grid.settingstab.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/window.settingstab.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/grid.categorytab.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/tabs/window.categorytab.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/combo/field.multiselect.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/xtype.multiselect.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/tabs/list.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'ms2extend-page-tabs-list',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
