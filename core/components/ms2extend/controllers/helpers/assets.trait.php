<?php

trait ms2ExtendControllerHelperAssets
{
    protected function loadCoreCssJs()
    {
        $this->addJavascript($this->service->jsUrl . 'mgr/' . $this->service::PKG_NAMESPACE . '.js');

        $this->addCss($this->service->cssUrl . 'mgr/core/styles.css');

        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/panel.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/formpanel.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/grid.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/localgrid.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/window.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/page.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.local.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.local.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.remote.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.remote.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/browser.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/core/misc/function.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/misc/component.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/misc/renderer.list.js');
    }

    protected function loadDefaultCssJs()
    {
        $this->addCss($this->service->cssUrl . 'mgr/default.css');
        $this->addJavascript($this->service->jsUrl . 'mgr/misc/function.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/misc/component.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/misc/renderer.list.js');
        $configJs = $this->modx->toJSON($this->service->config);
        $this->addHtml('<script type="text/javascript">' . get_class($this->service) . '.config = ' . $configJs . ';</script>');
    }
}
