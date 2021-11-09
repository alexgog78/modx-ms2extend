<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/getlist.class.php';

class ms2extendCategoryTabGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $this->prepareXtypesCombo($object);
        return parent::prepareRow($object);
    }

    /**
     * @param xPDOObject $object
     */
    private function prepareXtypesCombo(xPDOObject $object)
    {
        $tags = [];
        foreach ($object->get('xtypes') ?? [] as $value) {
            $tags[] = [
                'value' => $value,
            ];
        }
        $object->set('xtypes_combo', $tags);
    }
}

return 'ms2extendCategoryTabGetListProcessor';
