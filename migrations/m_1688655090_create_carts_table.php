<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1688655090_create_carts_table extends Migration
{
	public function up()
	{
		$this->db->create('carts', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('user_id')->type(DatabaseField::INT)->foreignKey('id', 'users'),
			$this->db->field()->name('status')->type(DatabaseField::INT)
		]);
	}

	public function down()
	{
		// drop users
		$this->db->drop('carts');
	}
}
