<?php

namespace app\models\cart;

use app\core\db\DBModel;
use app\models\products\Drink;

class CartItemDrink extends DBModel
{
	public int $item_id = 0;
	public int $drink_id = 0;

	public static function tableName(): string
	{
		return 'cart_item_drinks';
	}

	public function attributes(): array
	{
		return ['drink_id', 'item_id'];
	}

	/**
	 * Add a drink to a single cart item
	 * @return bool
	 */
	public function add(): bool
	{
		$rules = [
			'drink_id' => [self::RULE_REQUIRED],
			'item_id' => [self::RULE_REQUIRED]
		];

		$this->validate($rules);

		return $this->save();
	}

	/**
	 * Delete drink from a single cart item
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

	/**
	 * Get all drinks for an item
	 * @return array
	 */
	public function getAll()
	{
		$CartDrinks = new _CartDrink;
		$CartDrinks->item_id = $this->item_id;
		return $CartDrinks->get();
	}
}
