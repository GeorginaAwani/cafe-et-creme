<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1688655521_create_orders_table extends Migration
{
	public function up()
	{
		$this->db->create('orders', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('cart_id')->type(DatabaseField::INT)->foreignKey('id', 'carts'),
			$this->db->field()->name('status')->type(DatabaseField::INT)
		]);
	}

	public function down()
	{
		// drop users
		$this->db->drop('orders');
	}
}
