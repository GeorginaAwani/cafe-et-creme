<?php

use app\core\Migration;

/**
 * Creates cart_items_drinks view
 */
class m_1689501731_create_drinks_view extends Migration
{
	public function up()
	{
		$this->db->exec("CREATE VIEW vw_drinks AS (SELECT d.id, d.name, d.description, c.name AS category, d.quantity_in_store, d.is_alcoholic, d.image, d.price FROM drinks AS d INNER JOIN categories AS c ON d.category = c.id)");
	}

	public function down()
	{
		$this->db->exec("DROP VIEW vw_drinks");
	}
}
