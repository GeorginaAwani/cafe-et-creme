<?php

namespace app\controllers;

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
		if ($this->request()->isPost() && $this->request()->isAPIRequest()) {
			$User = new User;
			$Login = new Login;
			$Login->load();

			if ($Login->login($User)) {
				return $this->response()->sendSuccess([
					'message' => "You're now logged in",
					'redirect' => '/dashboard'
				]);
			} else {
				throw new FormException("Something went wrong");
			}
		}

		echo $this->render('login');
	}

	public function signup()
	{
		// user is submitting the form
		if ($this->request()->isPost() && $this->request()->isAPIRequest()) {
			// create an instance of the user class
			$User = new User;
			$User->load(); // load data from form into model

			if ($User->new()) {
				$this->response()->sendSuccess([
					'message' => "Account created successfully",
					'redirect' => '/login'
				]);
			} else {
				throw new FormException("Failed to create account");
			}
		}

		echo $this->render('signup');
	}
}
