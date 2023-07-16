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

	public function renderLogin(): void
	{
		die($this->render('login'));
	}

	public function renderSignup(): void
	{
		die($this->render('signup'));
	}

	public function handleLogin()
	{
		// use is logging in
		if ($this->request()->isPost() && $this->request()->isAPIRequest()) {
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
	}

	public function handleSignup()
	{
		// user is submitting the form
		if ($this->request()->isPost() && $this->request()->isAPIRequest()) {
			try {
				// create an instance of the user class
				$User = new User;
				$User->loadData(); // load data from form into model

				if ($User->save()) {
					$this->response()->sendSuccess([
						'message' => "Account created successfully",
						'redirect' => '/login'
					]);
				} else {
					throw new FormException("Failed to create accunt");
				}
			} catch (\Throwable $e) {
				$this->response()->sendError($e);
				exit;
			}
		}
	}
}
