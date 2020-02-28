<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $ms2Extend = $modx->getService('ms2extend', 'ms2Extend', $modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/', []);
            $manager = $modx->getManager();
            $tmp = [
                'ms2extendProductTab',
                'ms2extendCategoryTab',
                'ms2extendSettingsTab',
            ];
            foreach ($tmp as $v) {
                $manager->createObjectContainer($v);
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            $ms2Extend = $modx->getService('ms2extend', 'ms2Extend', $modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/', []);
            $manager = $modx->getManager();
            $tmp = [
                'ms2extendProductTab',
                'ms2extendCategoryTab',
                'ms2extendSettingsTab',
            ];
            foreach ($tmp as $v) {
                $manager->removeObjectContainer($v);
            }
            break;
    }
}
return true;
