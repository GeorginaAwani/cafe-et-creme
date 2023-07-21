<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exceptions\FormException;
use app\core\middlewares\AuthMiddleware;
use app\models\Contact;

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

	public function about(): void
	{
		echo $this->render('about');
	}
}
