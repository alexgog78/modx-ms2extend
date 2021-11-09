<?php

class buildModel
{
    /** @var modX */
    protected $modx;

    /** @var xPDOManager $manager */
    private $manager;

    /** @var xPDOGenerator $generator */
    private $generator;

    /**
     * @param modX $modx
     */
    public function __construct(modX $modx)
    {
        $this->modx = $modx;
        $this->manager = $modx->getManager();
        $this->generator = $modx->manager->getGenerator();
//        $modx->loadClass('transport.modPackageBuilder', '', false, true);
//        $this->builder = new modPackageBuilder($modx);
    }

    /**
     * @param string $schemaPath
     * @param string $modelPath
     * @return $this
     */
    public function parseSchema(string $schemaPath, string $modelPath)
    {
        $status = $this->generator->parseSchema($schemaPath, $modelPath);
        if (!$status) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Error generating model');
            exit();
        }
        return $this;
    }

    /**
     * @param string $mapFile
     * @return $this
     */
    public function createContainers(string $packageName, string $metadataPath, string $modelPath)
    {
        /**
         * @var $xpdo_meta_map
         * @noinspection PhpIncludeInspection
         */
        include $metadataPath;
        $this->modx->getService(strtolower($packageName), $packageName, $modelPath);
        foreach ($xpdo_meta_map as $baseClass => $extends) {
            foreach ($extends as $className) {
                $this->manager->createObjectContainer($className);
            }
        }
        return $this;
    }
}
