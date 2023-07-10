<?php

namespace app\models\cart;

use app\models\products\Topping;

/**
 * Relationship between cart items and toppings table
 * @author Georgina Awani
 * @copyright (c) 2023
 */
class _CartToppings extends _CartItem
{

	public static function tableName(): string
	{
		return 'vw_cart_item_toppings';
	}

	protected function className(): string
	{
		return Topping::class;
	}
}
