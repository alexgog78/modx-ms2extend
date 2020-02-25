<?php

require_once dirname(__FILE__) . '/config.inc.php';

class BuildModel extends abstractBuildModel
{
    /** @var string */
    protected $schemaPath = MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/model/schema/' . PKG_NAME_LOWER . '.mysql.schema.xml';

    /** @var string */
    protected $modelPath = MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/model/';
}
