<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/default.class.php';

class ms2ExtendMgrFieldsManagerController extends abstractModuleMgrDefaultController
{
    /** @var string */
    protected $pageTitle = 'fields';

    /** @var array */
    protected $languageTopics = [
        'ms2extend:field',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/fields/panel.fields.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/fields/list.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'ms2extend-page-fields-list',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
