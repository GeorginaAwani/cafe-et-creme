<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1688657361_create_cart_drinks_table extends Migration
{
	public function up()
	{
		$this->db->create('cart_item_drinks', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('item_id')->type(DatabaseField::INT)->foreignKey('id', 'cart_items'),
			$this->db->field()->name('drink_id')->type(DatabaseField::INT)->foreignKey('id', 'drinks'),
		]);
	}

	public function down()
	{
		// drop users
		$this->db->drop('cart_drinks');
	}
}
