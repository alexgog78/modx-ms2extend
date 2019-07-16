<?php
$xpdo_meta_map['ms2extProductTab'] = array(
    'package' => 'ms2extend',
    'version' => NULL,
    'table' => 'ms2ext_product_tabs',
    'extends' => 'xPDOSimpleObject',
    'tableMeta' =>
        array(
            'engine' => 'MyISAM',
        ),
    'fields' =>
        array(
            'name' => NULL,
            'fields' => NULL,
        ),
    'fieldMeta' =>
        array(
            'name' =>
                array(
                    'dbtype' => 'varchar',
                    'precision' => '255',
                    'phptype' => 'string',
                    'null' => true,
                ),
            'fields' =>
                array(
                    'dbtype' => 'text',
                    'phptype' => 'string',
                    'null' => true,
                    'default' => NULL,
                ),
        ),
);
