<?php

abstract class ms2ExtendRemoveProcessor extends modObjectRemoveProcessor
{
    /** @var string */
    public $objectType = 'ms2extend';

    /** @var array */
    public $languageTopics = [
        'ms2extend:status',
    ];

    /** @var object */
    protected $service;

    /**
     * @param modX $modx
     * @param array $properties
     */
    public function __construct(modX &$modx, array $properties = [])
    {
        parent::__construct($modx, $properties);
        $this->service = $this->modx->{$this->objectType};
    }
}
