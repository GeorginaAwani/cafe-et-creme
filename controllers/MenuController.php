<?php

namespace app\controllers;

use app\core\Controller;

class MenuController extends Controller
{
	public function __construct()
	{
		$this->layout = 'app';
	}

	public function index()
	{
		echo $this->render('menu/index');
	}

	public function menu()
	{
		echo $this->render('menu/menu');
	}
}
