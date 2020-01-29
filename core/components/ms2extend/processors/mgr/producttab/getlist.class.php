<?php

if (!$this->loadClass('getlist', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendProductTabGetListProcessor extends amObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'ms2extendProductTab';

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
        $objectArray['fields_combo'] = $this->getFieldsCombo($object);
        $objectArray['xtypes_combo'] = $this->getXtypesCombo($object);
        return $objectArray;
    }

    /**
     * @param xPDOObject $object
     * @return array
     */
    private function getFieldsCombo(xPDOObject $object)
    {
        $fields = [];
        foreach ($object->get('fields') ?? [] as $value) {
            if ($value === '') {
                continue;
            }
            $fields[] = [
                'value' => $value,
            ];
        }
        return $fields;
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

return 'ms2extendProductTabGetListProcessor';
