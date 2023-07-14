<?php

namespace app\models;

use app\core\Application;
use app\core\db\DBModel;

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

	protected int $user_id;
	protected int $status;

	public function __construct()
	{
		$this->user_id = Application::$App->user->id;
		$this->status = self::STATUS_ACTIVE;
	}

	public static function tableName(): string
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
	 * @return object
	 */
	private function fetch_cart_from_db(): object
	{
		return $this->fetchOne("`user_id` = :user_id AND status = :status", [
			':user_id' => $this->user_id,
			':status' => $this->status
		]);
	}

	/**
	 * Creates a cart if none exists and returns the cart id
	 * @return string|int
	 */
	public function save()
	{
		// check if a cart exists and
		$cart = $this->fetch_cart_from_db();

		if ($cart)
			return $cart->id;

		$this->user_id = Application::$App->user->id;
		$this->status = self::STATUS_ACTIVE;

		return parent::save();
	}

	public function checkout()
	{
		# code...
	}
}
