<?php

return [
    'map' => [
        'msProductData' => require_once dirname(__FILE__) . '/msproductdata.map.php',
    ],
    'manager' => [
        'msProductData' => MODX_ASSETS_URL . 'components/ms2extend/ms2/plugins/product/msproductdata.js',
    ],
];
