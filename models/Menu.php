<?php

namespace app\models;

use app\core\Model;
use app\models\products\Drink;
use app\models\products\Topping;

class Menu extends Model
{
	public string $search = '';

	protected function rules(): array
	{
		return [];
	}

	/**
	 * Attach search clause if search is available
	 * @return array
	 */
	private function _where()
	{
		$where = '';
		$params = [];

		if ($this->search) {
			$where = "name LIKE :search OR description LIKE :search";
			$params = [':search' => '%' . $this->search . '%'];
		}

		return [$where, $params];
	}

	/**
	 * Display drink menu
	 * @return array<array>
	 */
	public function drinks()
	{
		$drink = new Drink;
		$where = $this->_where();

		return ['drinks' => $drink->fetch($where[0], $where[1])];
	}

	/**
	 * Display topping menu
	 * @return array<array>
	 */
	public function toppings()
	{
		$topping = new Topping;
		$where = $this->_where();

		return ['toppings' => $topping->fetch($where[0], $where[1])];
	}
}
