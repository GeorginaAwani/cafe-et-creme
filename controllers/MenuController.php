<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\Menu;

class MenuController extends Controller
{
	private $search = '';
	public function __construct()
	{
		$this->layout = 'main';
		$this->_getQuery();
	}

	private function _getQuery()
	{
		$query = $this->request()->query();
		if (isset($query['search']))
			$this->search = $query['search'];
	}

	public function drinks()
	{
		$Menu = new Menu;
		$this->response()->data = $Menu->drinks();
		return $this->response()->send();
	}

	public function toppings()
	{
		$Menu = new Menu;
		// $this->response()->data = $Menu->
	}
}
