<?php

namespace ms2Extend\Handlers;

use \PDO;

class mgrLayoutHandler extends \abstractModule\Handlers\abstractHandler
{
    /**
     * @param $resource
     * @param array $tabsIds
     * return void
     */
    public function getProductLayout($resource, $tabsIds = [])
    {
        $query = $this->modx->newQuery('ms2extProductTab');
        $query->select($this->modx->getSelectColumns('ms2extProductTab', 'ms2extProductTab', ''));

        $query->where([
            'active' => 1
        ]);
        if (!empty($tabsIds)) {
            $query->where([
                'id:IN' => $tabsIds
            ]);
        }

        $query->prepare();
        $query->stmt->execute();
        $mas = $query->stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($mas as $item) {
            $item['fields'] = explode(',', $item['fields']);
            $tabs[] = $item;
        }

        $this->modx->controller->addLexiconTopic(get_class($this->module) . ':default');
        $configJs = $this->modx->toJSON($tabs ?? []);
        $this->modx->controller->addHtml('<script type="text/javascript">' . get_class($this->module) . '.tabs = ' . $configJs . ';</script>');
        $this->modx->controller->addJavascript($this->config['jsUrl'] . 'mgr/ms2/product/product.tabs.panel.js');
        $this->modx->controller->addLastJavascript($this->config['jsUrl'] . 'mgr/ms2/product/product.common.js');
    }
}