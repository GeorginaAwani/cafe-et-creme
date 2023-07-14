<?php

use app\core\Application;
use app\core\Controller;
use app\core\exceptions\FormException;
use app\models\Cart;
use app\models\cart\CartItem;
use app\models\cart\CartItemDrink;
use app\models\cart\CartItemTopping;

class CartController extends Controller
{
	/**
	 * Render cart view
	 * @return array|string
	 */
	public function cart()
	{
		die($this->render('cart'));
	}

	public function getCart()
	{
		try {
			$Cart = $this->CartItem();
			$cart = $Cart->getAll();
			$this->response()->sendSuccess(['items' => $cart]);
		} catch (\Throwable $e) {
			$this->response()->sendError($e);
		}
	}

	public function getItem(): void
	{
		try {
			$CartItem = $this->CartItem();
			$item = $CartItem->get();

			$this->response()->sendSuccess(['item' => $item]);
		} catch (\Throwable $e) {
			$this->response()->sendError($e);
		}
	}

	/**
	 * Create and load a cart item
	 * @return Cart\CartItem
	 */
	private function CartItem()
	{
		$Cart = new Cart;
		$CartItem = new CartItem;
		$CartItem->cart_id = $Cart->save();
		$CartItem->loadData();
		return $CartItem;
	}

	/**
	 * Create and load a cart drink item
	 * @return Cart\CartItemDrink
	 */
	private function Drink()
	{
		$Drink = new CartItemDrink;
		$Drink->loadData();
		return $Drink;
	}

	private function Topping()
	{
		$Topping = new CartItemTopping;
		$Topping->loadData();
		return $Topping;
	}

	/**
	 * Add or remove an item from cart
	 * @return void
	 */
	public function item()
	{
		// add to  cart
		if (Application::$App->Request->isPost()) {
			try {
				// cart item
				$CartItem = $this->CartItem();
				$item = $CartItem->add($this->Drink());

				$this->response()->sendSuccess($item, $this->response()::STATUS_CREATED);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
		// remove from cart
		elseif (Application::$App->Request->isDelete()) {
			try {
				$CartItem = $this->CartItem();
				$CartItem->remove();
				$this->response()->sendSuccess(['message' => "Cart item removed successfully"]);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	/**
	 * Add or remove a drink for an item
	 * @return void
	 */
	public function itemDrink()
	{
		// add drink to an item
		if (Application::$App->Request->isPut()) {
			try {
				// drink item
				$Drink = $this->Drink();
				$drinkId = $Drink->add();

				if ($drinkId) {
					$this->response()->sendSuccess(
						[
							'drinkId' => $drinkId,
							'message' => 'Drink added successfully'
						],
						$this->response()::STATUS_CREATED
					);
				}

				throw new FormException("Failed to add drink");
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
		// remove drink from an item
		elseif (Application::$App->Request->isDelete()) {
			try {
				$Drink = $this->Drink();
				if ($Drink->remove()) {
					$this->response()->sendSuccess(['message' => 'Drink successfully removed']);
				} else
					throw new FormException("Failed to remove drink");
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	/**
	 * Add or remove a topping for an item
	 * @return void
	 */
	public function itemTopping()
	{
		// add topping to an item
		if (Application::$App->Request->isPut()) {
			try {
				// topping item
				$Topping = $this->Topping();
				$toppingId = $Topping->add();

				if ($toppingId) {
					$this->response()->sendSuccess(
						[
							'toppingId' => $toppingId,
							'message' => 'Topping added successfully'
						],
						$this->response()::STATUS_CREATED
					);
					exit;
				}

				throw new FormException("Failed to add topping");
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
		// remove topping from an item
		elseif (Application::$App->Request->isDelete()) {
			try {
				$Topping = $this->Topping();
				if ($Topping->remove()) {
					$this->response()->sendSuccess(['message' => 'Topping removed successfully']);
				} else throw new FormException("Failed to remove topping");
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}
}
