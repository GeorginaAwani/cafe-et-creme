<?php

namespace app\models\cart;

use app\core\Application;
use app\core\DBModel;

/**
 * Creates and manages cart of user
 * @author Georgina Awani
 * @copyright (c) 2023
 */
class Cart extends DBModel
{
	protected const STATUS_ACTIVE = 1;
	protected const STATUS_CHECKED_OUT = 2;
	public const T_CART_ITEMS = 'cart_items';

	protected ?int $user_id = null;
	protected int $status;

	public function __construct()
	{
		$this->status = self::STATUS_ACTIVE;
	}

	public static function table(): string
	{
		return 'carts';
	}

	public function attributes(): array
	{
		return ['user_id', 'status'];
	}

	protected function rules(): array
	{
		return [];
	}

	/**
	 * Get cart from database
	 * @return object|null
	 */
	private function fetch_cart_from_db(): object|null
	{
		if (!$this->user_id)
			return null;

		return $this->all("`user_id` = :user_id AND status = :status", [
			':user_id' => $this->user_id,
			':status' => $this->status
		])[0];
	}

	/**
	 * Get current user cart
	 * @return string|null
	 */
	public function get(): string|null
	{
		$cart = $this->fetch_cart_from_db();
		return $cart->id ?? null;
	}

	/**
	 * Creates a cart
	 * @return string|int|null
	 */
	public function new()
	{
		// cannot fetch or create cart if user is not logged in
		if (!Application::$App->user)
			return null;

		$this->user_id = Application::$App->user->id;
		$this->status = self::STATUS_ACTIVE;

		return parent::create();
	}

	/**
	 * Checkout of cart
	 */
	public function remove()
	{
		# code...
	}

	/**
	 * 
	 */
	public function edit()
	{
		# code...
	}

	/**
	 * Get cart, or create if not exists
	 */
	public function retrieve()
	{
		$cart = $this->get();
		return $cart ?? $this->create();
	}
}
