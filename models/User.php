<?php

namespace app\models;

use app\core\db\DBModel;

class User extends DBModel
{
	public string $name = '';
	public string $email = '';
	public string $password = '';
	public string $confirm_password = '';

	public static function tableName(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'password'];
	}

	public function save()
	{
		$rules = [
			'name' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class, 'attribute' => 'email']],
			'password' => [self::RULE_REQUIRED],
			'confirm_password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'attribute' => 'password']]
		];

		$this->validate($rules);

		$this->password = password_hash($this->password, PASSWORD_BCRYPT);

		return parent::save();
	}
}
