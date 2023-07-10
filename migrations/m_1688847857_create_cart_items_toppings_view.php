<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1688847857_create_cart_items_toppings_view extends Migration
{
	public function up()
	{
		$this->db->exec("CREATE VIEW vw_cart_items_toppings AS (SELECT cit.id AS id, cit.item_id, cit.topping_id, t.name, t.description, t.image, t.price FROM cart_item_toppings AS cit INNER JOIN toppings AS t ON cit.topping_id = t.id)");
	}

	public function down()
	{
		$this->db->exec("DROP VIEW vw_cart_items_toppings");
	}
}
