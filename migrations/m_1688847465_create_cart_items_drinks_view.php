<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Creates cart_items_drinks view
 */
class m_1688847465_create_cart_items_drinks_view extends Migration
{
	public function up()
	{
		$this->db->exec("CREATE VIEW vw_cart_items_drinks AS (SELECT cid.id AS id, cid.item_id, cid.drink_id, d.name, d.description, d.category, d.is_alcoholic, d.image, d.price FROM cart_item_drinks AS cid INNER JOIN drinks AS d ON cid.drink_id = d.id)");
	}

	public function down()
	{
		$this->db->exec("DROP VIEW vw_cart_items_drinks");
	}
}
