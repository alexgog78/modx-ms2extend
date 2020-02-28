<?php

return [
    [
        'text' => 'ms2extend',
        'description' => 'ms2extend.management',
    ],
    [
        'text' => 'ms2extend.section.fields',
        'description' => 'ms2extend.section.fields.management',
        'parent' => 'ms2extend',
        'menuindex' => 0,
        'action' => 'mgr/fields',
    ],
    [
        'text' => 'ms2extend.section.tabs',
        'description' => 'ms2extend.section.tabs.management',
        'parent' => 'ms2extend',
        'menuindex' => 1,
        'action' => 'mgr/tabs',
    ],
];
