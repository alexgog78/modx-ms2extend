<?php

/**
 * @var modX $modx
 * @var modPackageBuilder $builder
 */

$classKey = 'modEvent';
$events = include PKG_BUILD_TRANSPORT_DATA_PATH . 'events.php';
foreach ($events as $data) {
    $event = $modx->newObject($classKey);
    $event->fromArray(array_merge([
        'service' => 6,
        'groupname' => PKG_NAME_LOWER,
    ], $data), '', true, true);

    $vehicle = $builder->createVehicle($event, [
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => 'name',
    ]);
    $builder->putVehicle($vehicle);
    $modx->log(modX::LOG_LEVEL_INFO, 'Added package ' . $classKey . ': ' . $data['name']);
}
