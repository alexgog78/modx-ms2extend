<?php

if (!$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true)) {
    return false;
}

class ms2extendCategoryTab extends abstractSimpleObject
{
    /** @var array */
    protected $booleanFields = [
        'is_active',
    ];

    /**
     * @param xPDOQuery|null $query
     * @return array
     */
    public function loadActiveCollection(xPDOQuery $query = null)
    {
        if (!$query) {
            $query = $this->xpdo->newQuery($this->_class);
        }
        $query->sortby('menuindex', 'ASC');
        $query->where([
            'is_active' => 1,
        ]);
        return $this->loadCollection($this->xpdo, $this->_class, $query);
    }
}
