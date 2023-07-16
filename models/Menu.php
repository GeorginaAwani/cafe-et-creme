<?php

namespace app\models;

use app\core\Model;
use app\models\products\Container;
use app\models\products\Drink;
use app\models\products\Topping;

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
		$drink = new Drink;

		$where = '';
		$params = [];

		if ($category) {
			// get category id
			$Category = new Category;
			$id = $Category->fetchOne("name = :name", [':name' => $category], ['id'])->id;
			$where = " AND category = :cid";
			$params = [':cid' => $id];
		}

		return ['drinks' => $drink->fetch($where, $params)];
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
