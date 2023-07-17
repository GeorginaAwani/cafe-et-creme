<?php

namespace app\models\products;

use app\core\Model;

/**
 * A model of the Drink result ser returned by either procedures to get drink
 * @author Georgina Awani
 * @copyright (c) 2023
 */
class _Drink extends Model
{
	public string $name = '';
	public string $description = '';
	public float $price = 0.0;
	public int|string $category = 0;
	public bool $is_alcoholic = false;
	public int $quantity_in_store = 0;
	public array|string $image = [];
	public ?int $quantity_in_cart = null;
}
