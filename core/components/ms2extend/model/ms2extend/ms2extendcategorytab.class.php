<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';
require_once dirname(__DIR__) . '/helpers/json.trait.php';

class ms2extendCategoryTab extends xPDOSimpleObject
{
    use ms2ExtendModelHelperMenuindex;
    use ms2ExtendModelHelperJson;

    /**
     * @param null $cacheFlag
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        $this->setMenuindex();
        $this->setJsonFields();
        return parent::save($cacheFlag);
    }
}
