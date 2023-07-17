<?php

namespace app\models;

use PDO;
use app\core\Model;
use app\core\Application;
use app\models\cart\Cart;
use app\models\products\_Drink;
use app\models\products\Topping;
use app\models\products\Container;

class Menu extends Model
{
	public string $search = '';
	public int $page = 1;

	protected function rules(): array
	{
		return [];
	}

	public function search()
	{
		// search here
	}

	/**
	 * Display drink menu
	 */
	public function getDrinks(?string $category = null)
	{
		// get cart id
		$Cart = new Cart;
		$cartId = $Cart->save();

		$cartId = $cartId ?? 'NULL';
		$category = $category ? "'$category'" : 'NULL';
		$offset = ($this->page * 15) - 15;

		$sql = "CALL GetDrinksAgainstCart($cartId, $category, $offset)";
		$query = Application::$App->DB->query($sql);

		return [
			'drinks' => $query->fetchAll(PDO::FETCH_CLASS, _Drink::class),
			'nextPage' => ($this->page + 1)
		];
	}

	/**
	 * Get a drink
	 */
	public function GetDrink(int $drink)
	{
		$Cart = new Cart;
		$cartId = $Cart->save();

		$cartId = $cartId ?? null;

		$query = Application::$App->DB->query("CALL GetDrinkAgainstCart($cartId, $drink)");

		return ['drink' => $query->fetchObject(_Drink::class)];
	}

	/**
	 * Display topping menu
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
	 * Display container menu
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
