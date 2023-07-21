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

	public function renderContact(): void
	{
		echo $this->render('contact');
	}

	public function handleContact(): void
	{
		// submit contact
		if (Application::$App->Request->isPost() && Application::$App->Request->isAPIRequest()) {
			try {
				$Contact = new Contact;
				$Contact->load();

				if ($Contact->save()) {
					$this->response()->sendSuccess([
						'message' => "Your message was sent successfully"
					]);
				} else {
					throw new FormException("Failed to submit message");
				}
			} catch (\Throwable $th) {
				$this->response()->sendError($th);
				die;
			}
		}
	}
}
