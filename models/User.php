<?php

namespace app\models;

use app\core\db\DBModel;

class User extends DBModel
{
	public const STATUS_ACTIVE = 1;
	public const STATUS_DEACTIVATED = 0;
	public string $name = '';
	public string $email = '';
	public string $password = '';
	public string $confirm_password = '';
	public string $status;

	public static function tableName(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'password', 'status'];
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

		$this->status = self::STATUS_ACTIVE;
		$this->password = password_hash($this->password, PASSWORD_BCRYPT);

		return parent::save();
	}
}
