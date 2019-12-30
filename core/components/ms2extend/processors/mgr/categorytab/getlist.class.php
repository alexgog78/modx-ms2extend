<?php

if (!class_exists('amObjectGetListProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/getlist.class.php';
}

class ms2extendCategoryTabGetListProcessor extends amObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $defaultSortField = 'menuindex';

    /**
     * @param xPDOQuery $c
     * @param string $query
     * @return xPDOQuery
     */
    public function searchQuery(xPDOQuery $c, $query)
    {
        $c->where([
            'name:LIKE' => '%' . $query . '%',
        ]);
        return $c;
    }

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $objectArray = parent::prepareRow($object);
        $objectArray['xtypes_combo'] = $this->getXtypesCombo($object);
        return $objectArray;
    }

    /**
     * @param xPDOObject $object
     * @return array
     */
    private function getXtypesCombo(xPDOObject $object)
    {
        $xtypes = [];
        foreach ($object->get('xtypes') ?? [] as $value) {
            if ($value === '') {
                continue;
            }
            $xtypes[] = [
                'value' => $value,
            ];
        }
        return $xtypes;
    }
}

return 'ms2extendCategoryTabGetListProcessor';
