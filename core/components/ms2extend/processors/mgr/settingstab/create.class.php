<?php

if (!$this->loadClass('abstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendSettingsTabCreateProcessor extends abstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'ms2extendSettingsTab';

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

return 'ms2extendSettingsTabCreateProcessor';
