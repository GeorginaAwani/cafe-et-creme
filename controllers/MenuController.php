<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Menu;

class MenuController extends Controller
{
	public function __construct()
	{
		$this->layout = 'app';
	}

	public function drink(int $drink)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;
				$Menu->loadData();

				// get drinks by category
				$data = $Menu->GetDrink($drink);

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	public function drinks(string $category = null)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;
				$Menu->loadData();

				$query = $this->request()->query();

				if (isset($query['search'])) {
					// search instead
					$Menu->search = $query['search'];
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
}
