<?php

if (!class_exists('ms2extendSettingsTabUpdateProcessor')) {
    require_once(dirname(__FILE__) . '/update.class.php');
}

class ms2extendSettingsTabUpdateFromGridProcessor extends ms2extendSettingsTabUpdateProcessor
{
    /**
     * @return bool|string|null
     */
    public function initialize()
    {
        $data = $this->getProperty('data');
        if (empty($data)) {
            return $this->modx->lexicon('invalid_data');
        }

        $data = $this->modx->fromJSON($data);
        if (empty($data)) {
            return $this->modx->lexicon('invalid_data');
        }

        $this->setProperties($data);
        $this->unsetProperty('data');

        return parent::initialize();
    }
}

return 'ms2extendSettingsTabUpdateFromGridProcessor';
