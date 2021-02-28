<?php

define('MODX_CORE_PATH', dirname(dirname(dirname(__DIR__))) . '/');
define('MODX_API_MODE', true);

/**
 * @var modX $modx
 * @noinspection PhpIncludeInspection
 */
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

/** @var ms2Extend $service */
$service = $modx->getService('ms2extend', 'ms2Extend', MODX_CORE_PATH . 'components/ms2extend/model/');


$query = $modx->newQuery('msProductFile');
$query->where([
    'parent' => 0,
    'active' => 0,
]);
$query->sortby('product_id', 'ASC');

$service->log('START');

$collection = $modx->getIterator('msProductFile', $query);

$productId = 0;

foreach ($collection as $item) {
    //Delete old
    $thumbs = $item->getMany('Children');
    foreach ($thumbs as $thumb) {
        if (!$thumb->remove()) {
            $service->log('Error removing thumbnail instance for msProductFile with primary key ' . $item->get('id'));
        }
        $service->log('Removed thumbnail instance for msProductFile with primary key ' . $item->get('id'));
    }

    //Generate new
    if (!$item->generateThumbnails()) {
        $service->log('Error generating thumbnails for msProductFile with primary key ' . $item->get('id'));
        continue;
    }
    $service->log('Generated thumbnails for msProductFile with primary key ' . $item->get('id'));

    //Set msProductData image/thumbnail fields
    if ($item->get('product_id') !== $productId) {
        $product = $modx->getObject('msProductData', [
            'id' => $item->get('product_id')
        ]);
        if (!$product) {
            continue;
        }
        $product->updateProductImage();
        $service->log('Updated image fields for msProductData with primary key ' . $item->get('product_id'));
        $productId = $item->get('product_id');
    }

    $item->set('active', 1);
    $item->save();
}

$service->log('Finish');
