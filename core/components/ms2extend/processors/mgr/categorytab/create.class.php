<?php

if (!class_exists('amObjectCreateProcessor')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/create.class.php';
}

class ms2extendCategoryTabCreateProcessor extends amObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'ms2extendCategoryTab';

    /** @var string */
    public $objectType = 'ms2extend';

    /**
     * @return bool
     */
    public function beforeSave()
    {
        $this->object->fromArray([
            'menuindex' => $this->modx->getCount($this->classKey),
        ]);
        return parent::beforeSave();
    }
}

return 'ms2extendCategoryTabCreateProcessor';
