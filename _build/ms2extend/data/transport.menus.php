<?php

return [
    'ms2extend' => [
        'description' => 'ms2extend.management',
    ],
    'ms2extend.section.fields' => [
        'description' => 'ms2extend.section.fields.management',
        'parent' => 'ms2extend',
        'menuindex' => 0,
        'action' => 'mgr/fields',
    ],
    'ms2extend.section.tabs' => [
        'description' => 'ms2extend.section.tabs.management',
        'parent' => 'ms2extend',
        'menuindex' => 1,
        'action' => 'mgr/tabs',
    ],
];
