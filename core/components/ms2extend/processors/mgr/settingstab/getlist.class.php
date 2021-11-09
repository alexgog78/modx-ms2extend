<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/getlist.class.php';

class ms2extendSettingsTabGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var string */
    public $classKey = 'ms2extendSettingsTab';

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $this->prepareFieldsCombo($object);
        $this->prepareXtypesCombo($object);
        return parent::prepareRow($object);
    }

    /**
     * @param xPDOObject $object
     */
    private function prepareFieldsCombo(xPDOObject $object)
    {
        $tags = [];
        foreach ($object->get('fields') ?? [] as $value) {
            $tags[] = [
                'value' => $value,
            ];
        }
        $object->set('fields_combo', $tags);
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

return 'ms2extendSettingsTabGetListProcessor';
