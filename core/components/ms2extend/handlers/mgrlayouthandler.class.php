<?php

namespace ms2Extend\Handlers;

class mgrLayoutHandler
{
    /** @var ms2Extend */
    private $ms2ext;

    /** @var array */
    private $config = array();

    /** @var modX */
    private $modx;

    /**
     * mgrLayoutHandler constructor.
     * @param ms2Extend $ms2Extend
     * @param array $config
     */
    function __construct(\ms2Extend & $ms2Extend, array $config = array())
    {
        $this->ms2ext = &$ms2Extend;
        $this->config = $config;
        $this->modx = &$ms2Extend->modx;
    }

    /**
     * @param array $tabsIds
     */
    public function getProductLayout($tabsIds = array())
    {
        $query = $this->modx->newQuery('ms2extProductTab');
        $query->select($this->modx->getSelectColumns('ms2extProductTab', 'ms2extProductTab', ''));

        if (!empty($tabsIds)) {
            $query->where(array(
                'id:IN' => $tabsIds
            ));
        }

        $query->prepare();
        $query->stmt->execute();
        $mas = $query->stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($mas as $item) {
            $item['fields'] = explode(',', $item['fields']);
            $tabs[] = $item;
        }

        $configJs = $this->modx->toJSON($tabs);
        $this->modx->regClientStartupScript('<script type="text/javascript">ms2ExtendConfig.tabs = ' . $configJs . ';</script>', true);
        $this->modx->controller->addLastJavascript($this->config['jsUrl'] . 'mgr/extend/product/product.common.js');
    }
}