<?php

return [
    'fields' => [
        'proteins' => 0,
        'fats' => 0,
        'carbohydrates' => 0,
        'calories' => 0,
    ],
    'fieldMeta' => [
        'proteins' => [
            'dbtype' => 'decimal',
            'precision' => '12,2',
            'phptype' => 'float',
            'default' => 0.0,
        ],
        'fats' => [
            'dbtype' => 'decimal',
            'precision' => '12,2',
            'phptype' => 'float',
            'default' => 0.0,
        ],
        'carbohydrates' => [
            'dbtype' => 'decimal',
            'precision' => '12,2',
            'phptype' => 'float',
            'default' => 0.0,
        ],
        'calories' => [
            'dbtype' => 'decimal',
            'precision' => '12,2',
            'phptype' => 'float',
            'default' => 0.0,
        ],
    ],
];
