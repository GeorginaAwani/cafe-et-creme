<?php

namespace app\models\cart;

use app\core\DBModel;
use app\core\exceptions\FormException;
use app\models\products\Container;

/**
 * Manages items in a cart. A cart item is comprised of at least one drink and may contain toppings.
 * @author Georgina Awani
 * @copyright (c) 2023
 */
class CartItem extends DBModel
{
	public int $cart_id = 0;
	public int $container_id = 0;
	public int $quantity = 0;

	protected array $drinks;
	protected array $toppings;

	public static function table(): string
	{
		return 'cart_items';
	}

	public function attributes(): array
	{
		return ['cart_id', 'container_id', 'quantity'];
	}

	/**
	 * Add an item to cart
	 * @param \app\models\cart\CartItemDrink $Drink
	 * @throws \app\core\exceptions\FormException
	 * @return array
	 */
	public function add(CartItemDrink $Drink): array
	{
		try {
			$this->db()->startTransaction();

			$rules = [
				'container_id' => [self::RULE_REQUIRED, [self::RULE_EXISTS, 'column' => 'id', 'table' => Container::tableName(), 'record' => 'conatiner']],
				'quantity' => [self::RULE_REQUIRED],
			];

			$this->validate($rules);

			// add this item to cart
			$itemId = $this->save();

			if ($itemId) {
				$Drink->item_id = $itemId;

				$drinkId = $Drink->add();

				if ($this->db()->commit())
					return [
						'itemId' => $itemId,
						'drinkId' => $drinkId,
						'message' => 'Item added to cart successfully'
					];
			}

			throw new FormException("Failed to add item to cart");
		} catch (\Throwable $e) {
			$this->db()->rollback();
			throw $e;
		}
	}

	/**
	 * Get a cart item
	 * @return object
	 */
	public function get()
	{
		$rules = [
			'id' => [self::RULE_REQUIRED]
		];

		$this->validate($rules);

		$item = $this->fetchOne("id = :id", [':id' => $this->id]);

		$Drink = new CartItemDrink;
		$Topping = new CartItemTopping;

		$item->drinks = $Drink->getAll();
		$item->toppings = $Topping->getAll();

		return $item;
	}

	/**
	 * Get all items in a cart
	 * @return array
	 */
	public function getAll()
	{
		// get all times in cart
		$items = $this->fetch("cart_id = :cart_id", [':cart_id' => $this->cart_id]);

		/**
		 * @var CartItem $item
		 */
		foreach ($items as $item) {
			// get all toppings and drinks for each time
			$Drink = new CartItemDrink;
			$Topping = new CartItemTopping;

			$Drink->item_id = $item->id;
			$Topping->item_id = $item->id;

			$item->drinks = $Drink->getAll();
			$item->toppings = $Topping->getAll();
		}

		return $items;
	}
	/**
	 * Remove an item from cart
	 * @throws \app\core\exceptions\FormException
	 * @return bool
	 */
	public function remove(): bool
	{
		try {
			$rules = [
				'id' => [self::RULE_REQUIRED]
			];

			$this->validate($rules);

			// delete item

			// because item id is a foreign key in the cart toppings and drinks table, a deletion would cause corresponding records to be automatically deleted as well
			if ($this->deleteByKey())
				return true;

			throw new FormException("Failed to remove cart item");
		} catch (\Throwable $e) {
			$this->db()->rollback();
			throw $e;
		}
	}
}
