<?php

use app\core\db\DatabaseField;
use app\core\Seeder;
use app\models\User;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689594567_seed_users_table extends Seeder
{
	protected function table(): string
	{
		return User::tableName();
	}

	protected function model(): string
	{
		return User::class;
	}

	private function data_array(): array
	{
		return [
			[
				'name' => 'Georgina Awani',
				'email' => 'georginaawani@gmail.com',
			],
			[
				'name' => 'Catherine Doe',
				'email' => 'catdoe@gmail.com',
			],
			[
				'name' => 'Cross Doe',
				'email' => 'crossdoe@gmail.com',
			],

		];
	}

	public function up()
	{
		foreach ($this->data_array() as $user) {
			$userData = $this->data();
			foreach ($user as $property => $value) {
				$userData->set($property, $value);
			}

			$userData->set('password', password_hash('123456', PASSWORD_BCRYPT))->set('status', User::STATUS_ACTIVE);

			$this->add($userData);
		}

		$this->seed();
	}
}
