<?php

$xpdo_meta_map['ms2extendCategoryTab'] = [
    'package' => 'ms2extend',
    'version' => '1.1',
    'table' => 'category_tabs',
    'extends' => 'ms2extendTab',
    'tableMeta' => [
        'engine' => 'InnoDB',
    ],
    'fields' => [
        'name' => NULL,
        'description' => NULL,
        'xtypes' => NULL,
        'sort_order' => 0,
        'is_active' => 0,
    ],
    'fieldMeta' => [
        'name' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'description' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'xtypes' => [
            'dbtype' => 'text',
            'phptype' => 'json',
            'null' => true,
        ],
        'sort_order' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'default' => 0,
        ],
        'is_active' => [
            'dbtype' => 'tinyint',
            'precision' => '1',
            'attributes' => 'unsigned',
            'phptype' => 'boolean',
            'null' => false,
            'default' => 0,
        ],
    ],
    'indexes' => [
        'sort_order' => [
            'alias' => 'sort_order',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'sort_order' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
        'is_active' => [
            'alias' => 'is_active',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'is_active' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
    ],
    'validation' => [
        'rules' => [
            'name' => [
                'preventBlank' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'xPDOMinLengthValidationRule',
                    'value' => '1',
                    'message' => 'field_required',
                ],
            ],
        ],
    ],
];
