<?php

if (!$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2extendSettingsTabCreateProcessor extends AbstractObjectCreateProcessor
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
