<?php

if (!class_exists('amSimpleObject')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/amsimpleobject.class.php';
}

class ms2extendProductTab extends amSimpleObject
{
    const BOOLEAN_FIELDS = [
        'is_active',
    ];

    const REQUIRED_FIELDS = [
        'name',
    ];

    const UNIQUE_FIELDS = [
        'name',
    ];

    const UNIQUE_FIELDS_CHECK_BY_CONDITIONS = [];

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
