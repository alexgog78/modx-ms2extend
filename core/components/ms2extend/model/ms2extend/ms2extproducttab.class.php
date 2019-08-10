<?php

if (!class_exists('amSimpleObject')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/amsimpleobject.class.php';
}

class ms2extProductTab extends amSimpleObject
{
    const REQUIRED_FIELDS = array(
        'name'
    );

    const UNIQUE_FIELDS = array(
        'name'
    );

    const UNIQUE_FIELDS_CHECK_BY_CONDITIONS = array();
}