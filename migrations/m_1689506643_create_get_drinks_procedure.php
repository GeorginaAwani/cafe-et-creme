<?php

use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689506643_create_get_drinks_procedure extends Migration
{
	public function up()
	{
		$this->db->exec("CREATE PROCEDURE GetDrinksAgainstCart(IN cartId INT, IN drinkCategory VARCHAR(50), INT offsetValue INT)
		BEGIN
		SET @query = '
				SELECT d.id, d.name, d.SELECT d.id, d.name, d.description, d.category, d.quantity_in_store, d.is_alcoholic, d.image, d.price, IF(cid.item_id IS NULL, 0,  ci.quantity) AS quantity_in_cart
				FROM (vw_drinks AS d
				LEFT JOIN cart_items AS ci ON d.id = ci.drink_id AND (? IS NULL OR ci.cart_id = ?))
				LEFT JOIN cart_item_drinks AS cid ON ci.id = cid.item_id
				WHERE (? IS NULL OR d.category = ?)
				GROUP BY d.id
				LIMIT 15 OFFSET ?
			';
			PREPARE stmt FROM @query;
			EXECUTE stmt USING cartId, cartId, drinkCategory, drinkCategory, offsetValue;
			DEALLOCATE PREPARE stmt;
		END;");
	}

	public function down()
	{
		$this->db->exec('DROP PROCEDURE [IF EXISTS] GetDrinksAgainstCart');
	}
}
