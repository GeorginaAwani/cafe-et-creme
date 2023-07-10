<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;

class SiteController extends Controller
{
	public function __construct()
	{
		$this->layout = 'main';
		$this->registerMiddleware(new AuthMiddleware(['dashboard']));
	}

	public function home()
	{
		echo $this->render('home');
	}
}
