<?php

return [
    [
        'text' => 'ms2extend',
        'description' => 'ms2extend_desc',
    ],
    [
        'text' => 'ms2extend_fields',
        'description' => 'ms2extend_fields_desc',
        'parent' => 'ms2extend',
        'menuindex' => 0,
        'action' => 'mgr/fields',
    ],
    [
        'text' => 'ms2extend_tabs',
        'description' => 'ms2extend_tabs_desc',
        'parent' => 'ms2extend',
        'menuindex' => 1,
        'action' => 'mgr/tabs',
    ],
];
