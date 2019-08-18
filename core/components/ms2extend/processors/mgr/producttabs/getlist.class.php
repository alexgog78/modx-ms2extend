<?php

if (!class_exists('amObjectGetListProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/getlist.class.php';
}

class ms2extProductTabGetListProcessor extends amObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'ms2extProductTab';

    /** @var string */
    public $objectType = 'ms2extend';

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

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object) {
        $objectArray = parent::prepareRow($object);

        $objectArray['fields_array'] = [];
        foreach ($object->get('fields') as $field) {
            if (empty($field)) {
                continue;
            }
            $objectArray['fields_array'][] = ['field' => $field];
        }

        return $objectArray;
    }
}
return 'ms2extProductTabGetListProcessor';