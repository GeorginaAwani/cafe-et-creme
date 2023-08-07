<?php

namespace app\models;

use app\core\DBModel;

class User extends DBModel
{
	public const STATUS_ACTIVE = 1;
	public const STATUS_DEACTIVATED = 0;
	public string $name = '';
	public string $email = '';
	public string $password = '';
	public string $confirm_password = '';
	public string $status;


	public static function table(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'password', 'status'];
	}

	private function rules()
	{
		return [
			'name' => [],
			'email' => [self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class, 'attribute' => 'email']],
			'password' => [],
			'confirm_password' => [[self::RULE_MATCH, 'attribute' => 'password']]
		];
	}

	/**
	Create a new record of this model
	 **/
	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

		$this->status = self::STATUS_ACTIVE;
		$this->password = password_hash($this->password, PASSWORD_BCRYPT);

		return parent::create();
	}

	/**
	Get a record of this model from database
	 **/
	public function get()
	{
		// return parent::read();
	}

	/**
	Edit an existing record of this model
	 **/
	public function edit()
	{
		// return parent::update();
	}

	/**
	Delete a record of this model
	 **/
	public function remove()
	{
		// return parent::delete();
	}

	/**
	Get records of this model
	 **/
	public function retrieve()
	{
		// return parent::all();
	}
}
