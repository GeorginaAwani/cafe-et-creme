<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1688653561_create_users_table extends Migration
{
	public function up()
	{
		$this->db->create('users', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('name')->type(DatabaseField::VARCHAR)->size(50),
			$this->db->field()->name('email')->type(DatabaseField::VARCHAR)->size(255)->unique(),
			$this->db->field()->name('password')->type(DatabaseField::VARCHAR)->size(512),
			$this->db->field()->name('status')->type(DatabaseField::INT)
		]);
	}

	public function down()
	{
		// drop users
		$this->db->drop('users');
	}
}
