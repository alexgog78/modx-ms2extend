<?php

if (!class_exists('ms2extendCategoryTabUpdateProcessor')) {
    require_once(dirname(__FILE__) . '/update.class.php');
}

class ms2extendCategoryTabUpdateFromGridProcessor extends ms2extendCategoryTabUpdateProcessor
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

return 'ms2extendCategoryTabUpdateFromGridProcessor';
