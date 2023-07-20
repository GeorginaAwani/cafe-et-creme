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

	public function categories()
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;

				$data = $Menu->categories();

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	public function drink(int $drink)
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;
				$Menu->loadData();

				// get drinks by category
				$data = $Menu->drink($drink);

				$this->response()->sendSuccess($data);
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}
	}

	public function drinks()
	{
		if ($this->request()->isGet() && $this->request()->isAPIRequest()) {
			try {
				$Menu = new Menu;
				$Menu->loadData();

				$this->response()->sendSuccess($Menu->drinks());
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

	public function menu()
	{
		echo $this->render('menu');
	}
}
