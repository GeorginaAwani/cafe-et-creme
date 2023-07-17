<?php

namespace app\models;

use PDO;
use app\core\Model;
use app\core\Application;
use app\models\products\Drink;
use app\models\products\Topping;
use app\models\products\Container;

class Menu extends Model
{
	public string $search = '';

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

		if ($category) {
			$query = Application::$App->DB->query("CALL GetDrinks($cartId, '$category')");
		} else {
			$query = Application::$App->DB->query("CALL GetDrinks($cartId)");
		}

		return ['drinks' => $query->fetchAll(PDO::FETCH_CLASS), Drink::class];
	}

	/**
	 * Get a drink
	 */
	public function getDrink(int $drink)
	{
		$Drink = new _Drink;
		$Drink->id = $drink;
		return ['drink' => $Drink->get()];
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
