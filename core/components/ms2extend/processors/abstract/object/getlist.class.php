<?php
abstract class ms2extGetListProcessor extends modObjectGetListProcessor {
	/**
	 * @var array
	 */
	public $languageTopics = array('ms2extend:default');

	/**
	 * @var string
	 */
	public $defaultSortField = 'id';

	/**
	 * @var string
	 */
	public $defaultSortDirection = 'ASC';
}