<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689578798_create_get_drink_procedure extends Migration
{
	public function up()
	{
		$this->db->exec("CREATE PROCEDURE GetDrink(IN cartId INT, IN drinkId INT)
		BEGIN
			SET @query = '
				SELECT d.id, d.name, d.description, d.category, d.quantity_in_store, d.is_alcoholic, d.image, d.price, IF(cid.item_id IS NULL, ci.quantity, 0) AS quantity_in_cart
				FROM vw_drinks AS d
				LEFT JOIN cart_items AS ci ON d.id = ci.drink_id
				LEFT JOIN cart_item_drinks AS cid ON ci.id = cid.item_id
				WHERE ci.cart_id = ? AND d.id = ?';
			PREPARE stmt FROM @query;
			EXECUTE stmt USING cartId, drinkId;
			DEALLOCATE PREPARE stmt;
		END;");
	}

	public function down()
	{
		$this->db->exec('DROP PROCEDURE [IF EXISTS] GetDrink');
	}
}
