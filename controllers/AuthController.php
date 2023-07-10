<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exceptions\FormException;
use app\models\Login;
use app\models\User;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->layout = 'auth';
	}

	public function login()
	{
		// use is logging in
		if (Application::$App->Request->isPost()) {
			try {
				$User = new User;
				$Login = new Login;
				$Login->loadData();

				if ($Login->login($User)) {
					$this->response()->sendSuccess([
						'message' => "You're now logged in",
						'redirect' => '/dashboard'
					]);
				} else {
					throw new FormException("Something went wrong");
				}
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
			}
		}

		// render view
		die($this->render('login'));
	}

	public function signup()
	{
		// user is submitting the form
		if (Application::$App->Request->isPost()) {
			try {
				// create an instance of the user class
				$User = new User;
				$User->loadData(); // load data from form into model

				if ($User->create()) {
					$this->response()->sendSuccess([
						'message' => "Account created successfully",
						'redirect' => '/login'
					]);
				} else {
					throw new FormException("Something went wrong");
				}
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
				exit;
			}
		}

		die($this->render('signup'));
	}
}
