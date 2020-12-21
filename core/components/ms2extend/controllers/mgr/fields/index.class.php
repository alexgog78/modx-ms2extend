<?php

require_once dirname(__DIR__) . '/default.class.php';

class ms2ExtendMgrFieldsManagerController extends ms2ExtendMgrDefaultController
{
    /** @var string */
    protected $pageTitle = 'ms2extend_fields';

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
