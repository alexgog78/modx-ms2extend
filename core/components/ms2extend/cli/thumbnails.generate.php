<?php

//TODO

/**
 * Set msProductFile active = 0 before running this script
 */

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config/config.inc.php';

if (!class_exists('AbstractCLI')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/cli/abstractcli.class.php';
}

class ms2ExtendThumbnailsGenerate extends AbstractCLI
{
    const CLASS_KEY = 'msProductFile';

    /** @var int */
    private $offset = 0;

    /** @var int */
    private $limit = 0;

    /** @var minishop2 */
    private $miniShop2;

    /**
     * regenerateThumbnails constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
        if (isset($config[0])) {
            $this->limit = $config[0];
        }
        if (isset($config[1])) {
            $this->offset = $config[1];
        }
        $this->miniShop2 = $this->modx->getService('miniShop2');
    }

    public function run()
    {
        $collection = $this->getProductImageCollection();
        foreach ($collection as $item) {
            if (!$this->deleteThumbnails($item)) {
                continue;
            }
            if (!$this->generateThumbnails($item)) {
                continue;
            }
            $item->set('active', 1);
            $item->save();
        }
        $this->log('Finish');
    }

    /**
     * @return xPDOIterator
     */
    private function getProductImageCollection()
    {
        $query = $this->modx->newQuery(self::CLASS_KEY);
        $query->where([
            'parent' => 0,
            'active' => 0,
        ]);
        $query->sortby('product_id', 'ASC');
        $query->limit($this->limit, $this->offset);
        return $this->modx->getIterator(self::CLASS_KEY, $query);
    }

    /**
     * @param msProductFile $image
     * @return bool
     */
    private function deleteThumbnails(msProductFile $image)
    {
        $thumbs = $image->getMany('Children');
        foreach ($thumbs as $thumb) {
            if (!$thumb->remove()) {
                $this->log('Error: deleting thumbnails for "' . $image->id . '"', modX::LOG_LEVEL_ERROR);
                return false;
            }
        }
        $this->log('Success: generating thumbnails for "' . $image->id . '"');
        return true;
    }

    /**
     * @param msProductFile $image
     * @return bool
     */
    private function generateThumbnails(msProductFile $image)
    {
        if (!$image->generateThumbnails()) {
            $this->log('Error: generating thumbnails for "' . $image->id . '"', modX::LOG_LEVEL_ERROR);
            return false;
        }
        $this->log('Success: generating thumbnails for "' . $image->id . '"');
        return true;
    }
}

array_shift($argv);
$regenerateThumbnails = new ms2ExtendThumbnailsGenerate($argv);
$regenerateThumbnails->run();
exit();
