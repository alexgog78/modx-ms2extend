<?php

if (!class_exists('amObjectGetListProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/getlist.class.php';
}

class ms2extProductTabGetListProcessor extends amObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'ms2extProductTab';

    /**
     * @param xPDOQuery $c
     * @param string $query
     * @return xPDOQuery
     */
    public function searchQuery(xPDOQuery $c, $query)
    {
        $c->where([
            'name:LIKE' => '%' . $query . '%'
        ]);
        return $c;
    }
}
return 'ms2extProductTabGetListProcessor';