<?php

namespace app\core;

use app\core\exceptions\PageNotFoundException;

class Router
{
	private array $routes = [];

	public function get(string $path, array $callback, bool $render = true)
	{
		$this->routes['get'][$path] = [$callback, $render];
	}

	public function post(string $path, array $callback)
	{
		$this->routes['post'][$path] = [$callback, true];
	}

	public function resolve()
	{
		// get path and method and call callback
		$path = Application::$App->Request->path();
		$method = Application::$App->Request->method();
		$callback = $this->routes[$method][$path] ?? false;

		if (!$callback) {
			Application::$App->Response->setStatusCode(Application::$App->Response::STATUS_PAGE_NOT_FOUND);
			throw new PageNotFoundException();
		}
		/**
		 * @var Controller $controller
		 */
		$controller = new $callback[0][0]();

		// process callback
		Application::$App->Controller = $controller;
		Application::$App->Controller->setAction($callback[0][1]);
		Application::$App->Controller->setRender($callback[1]);

		// TODO: check if user had access to this page using middlewares
		foreach (Application::$App->Controller->getMiddlewares() as $middleware) {
			$middleware->execute();
		}

		$callback[0][0] = $controller;

		return call_user_func($callback[0]);
	}
}
