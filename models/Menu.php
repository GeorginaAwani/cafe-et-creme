<?php

namespace app\models;

use PDO;
use app\core\Model;
use app\core\Application;
use app\models\cart\Cart;
use app\models\products\_Drink;
use app\models\products\Topping;
use app\models\products\Category;
use app\models\products\Container;

class Menu extends Model
{
	public ?string $search = null;
	public ?string $category = null;
	public int $page = 1;

	/**
	 * Get categories
	 */
	public function categories(): array
	{
		$Category = new Category;

		return ['containers' => $Category->fetch()];
	}

	/**
	 * Display drink menu
	 */
	public function drinks()
	{		// get cart id
		$Cart = new Cart;
		$cartId = $Cart->save();

		if (!is_null($this->category))
			$this->category = str_replace('-', ' ', $this->category);

		$cartId = $cartId ?? 'NULL';
		$category = $this->category ? "'{$this->category}'" : 'NULL';
		$search = $this->search ? "'{$this->search}'" : 'NULL';
		$offset = ($this->page * 15) - 15;

		$sql = "CALL GetDrinksAgainstCart($cartId, $category, $search, $offset)";
		$query = Application::$App->DB->query($sql);

		return [
			'drinks' => $query->fetchAll(PDO::FETCH_CLASS, _Drink::class),
			'nextPage' => ($this->page + 1)
		];
	}

	/**
	 * Get a drink
	 */
	public function drink(int $drink)
	{
		$Cart = new Cart;
		$cartId = $Cart->save();

		$cartId = $cartId ?? null;

		$query = Application::$App->DB->query("CALL GetDrinkAgainstCart($cartId, $drink)");

		return ['drink' => $query->fetchObject(_Drink::class)];
	}

	/**
	 * Get toppings
	 * @return array<array>
	 */
	public function toppings(?int $topping = null)
	{
		$Topping = new Topping;

		if ($topping) {
			return [
				'topping' => $Topping->fetchOne("id = :name", [':id' => $topping])
			];
		}

		return ['toppings' => $Topping->fetch()];
	}

	/**
	 * Get containers
	 * @return array<array>
	 */
	public function containers(?int $container = null)
	{
		$Container = new Container;

		if ($container) {
			return [
				'container' => $Container->fetchOne("id = :name", [':id' => $container])
			];
		}

		return ['containers' => $Container->fetch()];
	}
}
