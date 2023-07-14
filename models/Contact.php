<?php

namespace app\models;

use app\core\db\DBModel;

class Contact extends DBModel
{
	public string $name = '';
	public string $email = '';
	public string $phone = '';
	public string $message = '';
	public string $country_code = '';

	public static function tableName(): string
	{
		return 'contact';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'phone', 'message', 'country_code'];
	}

	public function save()
	{
		$rules = [
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

		$this->validate($rules);

		return parent::save();
	}
}
