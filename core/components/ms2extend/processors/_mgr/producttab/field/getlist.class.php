<?php

class ms2extendProductTabFieldGetListProcessor extends modObjectProcessor
{
    /** @var string */
    private $query;

    /** @var int */
    private $start;

    /** @var int */
    private $limit;

    /** @var array */
    private $fields = [];

    /**
     * @return mixed
     */
    public function process()
    {
        $this->query = trim($this->getProperty('query'));
        $this->start = (int)$this->getProperty('start', 0);
        $this->limit = (int)$this->getProperty('limit', 10);

        $this->fields = $this->getFields();
        $this->filterQuery();
        $rows = $this->prepareRows() ?? [];
        return $this->outputArray(array_slice($rows, $this->start, $this->limit), count($rows));
    }

    /**
     * @return array
     */
    private function getFields()
    {
        $docFields = $this->modx->getFields('msProduct');
        $dataFields = $this->modx->getFields('msProductData');
        $fields = array_merge(array_keys($docFields), array_keys($dataFields));
        sort($fields);
        return $fields;
    }

    /**
     * @return array|bool
     */
    private function filterQuery()
    {
        if (empty($this->query)) {
            return true;
        }
        $this->fields = array_filter($this->fields, function ($value) {
            if (strpos($value, $this->query) === false) {
                return false;
            }
            return true;
        });
        return $this->fields;
    }

    /**
     * @return array
     */
    private function prepareRows()
    {
        $values = [];
        foreach ($this->fields as $key => $value) {
            $values[] = ['value' => $value];
        }
        return $values;
    }
}

return 'ms2extendProductTabFieldGetListProcessor';
