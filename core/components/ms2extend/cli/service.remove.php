<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config/config.inc.php';

if (!class_exists('AbstractCLI')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/cli/abstractcli.class.php';
}

class ms2ExtendServiceRemove extends AbstractCLI
{
    public function run()
    {
        // TODO: Implement run() method.
    }
}
