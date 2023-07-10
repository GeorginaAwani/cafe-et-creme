<?php

namespace app\models;

use app\core\db\DBModel;

class User extends DBModel
{
	public int $id;
	public string $name = '';
	public string $email = '';
	public string $password = '';

	public static function tableName(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'password'];
	}

	public function primaryKeyField(): string
	{
		return 'id';
	}

	public function create()
	{
		$rules = [
			'name' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE],
			'password' => [self::RULE_REQUIRED]
		];

		$this->validate($rules);

		$this->password = password_hash($this->password, PASSWORD_BCRYPT);

		return parent::save();
	}
}
