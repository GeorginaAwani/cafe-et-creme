<?php

namespace app\models;

use app\core\DBModel;

class Table extends DBModel
{
	public static function table(): string
	{
		return 'tables';
	}

	public function attributes(): array
	{
		return ['number', 'capacity', 'is_available', 'position'];
	}

	private function rules()
	{
		return [
			'number' => [self::RULE_NUMERIC],
			'capacity' => [self::RULE_NUMERIC, [self::RULE_MIN, 'min' => 1], [self::RULE_MAX, 'max' => 12]],
			'position' => [[self::RULE_IN, ['window', 'bar', 'booth', 'entrance', 'outdoor', 'kitchen', 'lounge']]]
		];
	}

	/**
	Create a new record of this model
	 **/
	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

		return parent::create();
	}

	/**
	Get a record of this model from database
	 **/
	public function get()
	{
		return parent::read();
	}

	/**
	Edit an existing record of this model
	 **/
	public function edit()
	{
		return parent::update();
	}

	/**
	Delete a record of this model
	 **/
	public function remove()
	{
		return parent::delete();
	}

	/**
	Get records of this model
	 **/
	public function retrieve()
	{
		return parent::all();
	}
}
