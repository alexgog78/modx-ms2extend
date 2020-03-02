<?php

require_once dirname(__FILE__) . '/config.inc.php';
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'components/abstractmodule/cli/abstractbuildmodel.class.php';

class BuildModel extends AbstractBuildModel
{
    /** @var string */
    protected $schemaPath = MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/model/schema/' . PKG_NAME_LOWER . '.mysql.schema.xml';

    /** @var string */
    protected $modelPath = MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/model/';
}

array_shift($argv);
$build = new BuildModel($argv);
$build->run();
exit();
