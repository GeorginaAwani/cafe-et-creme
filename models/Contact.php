<?php

namespace app\models;

use app\core\DBModel;

class Contact extends DBModel
{
	public string $name = '';
	public string $email = '';
	public string $phone = '';
	public string $message = '';
	public string $country_code = '';

	public static function table(): string
	{
		return 'contact';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'phone', 'message', 'country_code'];
	}

	private function rules()
	{
		return [
			'name' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'phone' => [
				self::RULE_REQUIRED,
				self::RULE_NUMERIC,
				[self::RULE_MIN, 'min' => 6],
				[self::RULE_MAX, 'max' => 14]
			],
			'message' => [self::RULE_REQUIRED],
			'country_code' => [
				self::RULE_REQUIRED,
				self::RULE_NUMERIC,
				[self::RULE_MAX, 'max' => 3]
			]
		];
	}

	/**
	Create a new record of this model
	 **/
	public function new()
	{
		$this->validate($this->rules());

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
