<?php

$this->modx->loadClass('AbstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true);

abstract class ms2ExtendManagerController extends AbstractManagerController
{
    /** @var string\bool */
    protected $moduleClass = 'ms2Extend';

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->config['jsUrl'] . 'mgr/combo/field.multiselect.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/combo/xtype.multiselect.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.indevelopment.js');
        $this->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.undefined.js');
    }
}
