<?php

require_once dirname(__DIR__) . '/helpers/setboolean.trait.php';

abstract class ms2ExtendUpdateProcessor extends modObjectUpdateProcessor
{
    use ms2ExtendProcessorHelperSetBoolean;

    /** @var string */
    public $objectType = 'ms2extend';

    /** @var array */
    public $languageTopics = [
        'ms2extend:status',
    ];

    /** @var object */
    protected $service;

    /** @var bool */
    protected $softValidate = true;

    /**
     * @param modX $modx
     * @param array $properties
     */
    public function __construct(modX &$modx, array $properties = [])
    {
        parent::__construct($modx, $properties);
        $this->service = $this->modx->{$this->objectType};
    }

    /**
     * @return mixed
     */
    public function beforeSet()
    {
        $this->setBoolean();
        return parent::beforeSet();
    }

    /**
     * @return bool
     */
    public function beforeSave()
    {
        if ($this->softValidate) {
            $this->softValidate();
        }
        return parent::beforeSave();
    }

    private function softValidate()
    {
        if (!$this->object->validate()) {
            /** @var modValidator $validator */
            $validator = $this->object->getValidator();
            if ($validator->hasMessages()) {
                foreach ($validator->getMessages() as $message) {
                    $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
                }
            }
        }
    }
}
