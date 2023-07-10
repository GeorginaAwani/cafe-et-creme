<?php

namespace app\models\cart;

use app\models\products\Drink;

/**
 * Relationship between cart items and drinks table
 * @author Georgina Awani
 * @copyright (c) 2023
 */
class _CartDrink extends _CartItem
{
	public static function tableName(): string
	{
		return 'vw_cart_item_drinks';
	}

	protected function className(): string
	{
		return Drink::class;
	}
}
