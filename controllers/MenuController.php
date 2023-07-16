<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\_Drink;
use app\models\Menu;

class MenuController extends Controller
{
	private $search = '';
	public function __construct()
	{
		$this->layout = 'app';
		$this->_getQuery();
	}

	private function _getQuery()
	{
		$query = $this->request()->query();
		if (isset($query['search']))
			$this->search = $query['search'];
	}

	public function drink(int $drink)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;
				$Menu->loadData();

				// get drinks by category
				$data = $Menu->getDrink($drink);

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}


	public function toppings(int $topping = null)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;

				// get drinks by category
				$data = $Menu->toppings($topping);

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	public function containers(int $container = null)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;

				// get drinks by category
				$data = $Menu->containers($container);

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	public function renderMenu()
	{
		echo $this->render('menu');
	}

	public function handleMenu(string $category)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;
				$Menu->loadData();

				$search = $this->request()->query();

				if (isset($search['search'])) {
					// search instead
					$Menu->search = $search['search'];
					$data = [];
				} else {
					// get drinks by category
					$data = $Menu->getDrinks($category);
				}

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}
}
