<?php

if (!$this->loadClass('abstractCommand', MODX_BASE_PATH . '_build/abstractmodule/', true, true)) {
    return false;
}

class regenerateThumbnails extends abstractCommand
{
    const CLASS_KEY = 'msProductFile';

    /** @var int */
    private $offset = 0;

    /** @var int */
    private $limit = 0;

    /** @var array */
    private $collection = [];

    /**
     * regenerateThumbnails constructor.
     * @param modX $modx
     * @param array $config
     */
    public function __construct(modX &$modx, $config = [])
    {
        if ($config[0]) {
            $this->limit = $config[0];
        }
        if ($config[1]) {
            $this->offset = $config[1];
        }
        parent::__construct($modx, $config);
    }

    public function run()
    {
        $this->collection = $this->getProductsCollection();
        foreach ($this->collection as $item) {
            if(!$this->deleteThumbnails($item)) {
                continue;
            }
            if(!$this->generateThumbnails($item)) {
                continue;
            }
            $item->set('active', 1);
            $item->save();
        }
    }

    /**
     * @return array|null
     */
    private function getProductsCollection()
    {
        $query = $this->modx->newQuery(self::CLASS_KEY);
        $query->where([
            'parent' => 0,
            'active' => 0,
        ]);
        $query->sortby('product_id', 'ASC');
        $query->limit($this->limit, $this->offset);
        return $this->modx->getCollection(self::CLASS_KEY, $query);
    }

    /**
     * @param msProductFile $image
     * @return bool
     */
    private function deleteThumbnails(msProductFile $image)
    {
        $thumbs = $image->getMany('Children');
        foreach($thumbs as $thumb){
            if(!$thumb->remove()) {
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
        if(!$image->generateThumbnails()) {
            $this->log('Error: generating thumbnails for "' . $image->id . '"', modX::LOG_LEVEL_ERROR);
            return false;
        }
        $this->log('Success: generating thumbnails for "' . $image->id . '"');
        return true;
    }
}
