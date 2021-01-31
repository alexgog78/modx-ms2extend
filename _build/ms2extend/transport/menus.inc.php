<?php

/**
 * @var modX $modx
 * @var modPackageBuilder $builder
 */

$classKey = 'modMenu';
$settings = include PKG_BUILD_TRANSPORT_DATA_PATH . 'menus.php';
foreach ($settings as $data) {
    $setting = $modx->newObject($classKey);
    $setting->fromArray(array_merge([
        'parent' => 'components',
        'namespace' => PKG_NAME_LOWER,
    ], $data), '', true, true);

    $vehicle = $builder->createVehicle($setting, [
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => 'text',
    ]);
    $builder->putVehicle($vehicle);
    $modx->log(modX::LOG_LEVEL_INFO, 'Added package ' . $classKey . ': ' . $data['action']);
}
