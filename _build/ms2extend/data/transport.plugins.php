<?php

return [
    [
        'name' => 'ms2Extend',
        'static_file' => MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/' . 'elements/plugins/ms2extend.php',
        'events' => [
            'msOnManagerCustomCssJs'
        ]
    ]
];
