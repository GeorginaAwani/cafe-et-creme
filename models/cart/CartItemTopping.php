<?php

namespace app\models\cart;

use app\core\DBModel;
use app\models\products\Topping;

class CartItemTopping extends DBModel
{
	public int $item_id = 0;
	public int $topping_id = 0;

	public static function table(): string
	{
		return 'cart_item_toppings';
	}

	public function attributes(): array
	{
		return ['item_id', 'topping_id', 'id'];
	}

	/**
	 * Add a topping to a single cart item
	 * @return bool
	 */
	public function add(): bool
	{
		$rules = [
			'topping_id' => [self::RULE_REQUIRED],
			'item_id' => [self::RULE_REQUIRED]
		];

		$this->validate($rules);

		return $this->save();
	}

	/**
	 * Get all drinks for an item
	 */
	public function getAll()
	{
		$Toppings = new _CartToppings;
		$Toppings->item_id = $this->item_id;

		return $Toppings->get();
	}

	/**
	 * Remove topping from a single cart item
	 * @return bool
	 */
	public function remove(): bool
	{
		$rules = [
			'id' => [self::RULE_REQUIRED]
		];

		$this->validate($rules);

		return $this->deleteByKey() ?? false;
	}
}
