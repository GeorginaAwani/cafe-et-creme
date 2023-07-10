<?php

namespace app\core;

use app\core\exceptions\PageNotFoundException;

class Router
{
	private array $routes = [];

	/**
	 * Handles a get request
	 * @param string $path
	 * @param array $callback
	 * @return void
	 */
	public function get(string $path, array $callback)
	{
		$this->save_route('get', $path, $callback);
	}

	/**
	 * Handles a post request
	 * @param string $path
	 * @param array $callback
	 * @return void
	 */
	public function post(string $path, array $callback)
	{
		$this->save_route('post', $path, $callback);
	}

	/**
	 * Handles a put request
	 * @param string $path
	 * @param array $callback
	 * @return void
	 */
	public function put(string $path, array $callback): void
	{
		$this->save_route('put', $path, $callback);
	}

	/**
	 * Handles a delete request
	 * @param string $path
	 * @param array $callback
	 * @return void
	 */
	public function delete(string $path, array $callback): void
	{
		$this->save_route('delete', $path, $callback);
	}

	/**
	 * Add a route to the route-method map
	 * @param string $method
	 * @param string $path
	 * @param array $callback
	 * @return void
	 */
	private function save_route(string $method, string $path, array $callback)
	{
		$this->routes[$method][$path] = $callback;
	}

	/**
	 * Checks if a path matches a given route
	 * @param string $pattern
	 * @param string $uri
	 * @return bool|int
	 */
	private function match(string $pattern, string $uri)
	{
		$pattern = str_replace('/', '\/', $pattern);
		$pattern = '/^' . $pattern . '$/';

		return preg_match($pattern, $uri);
	}

	/**
	 * Returns a map of placeholder and values from the URI
	 * @param string $pattern
	 * @param string $uri
	 * @return array
	 */
	private function extract(string $pattern, string $uri)
	{
		// get all placeholder value from pattern
		preg_match_all('/{(.+?)}/', $pattern, $matches);
		$placeholders = $matches[1];

		if (!count($placeholders))
			return [];

		// get corresponding matching values from the path
		preg_match_all($pattern, $uri, $values);
		$parameters = array_slice($values, 1);

		return array_combine($placeholders, $parameters);
	}

	/**
	 * Maps routes to Controllers
	 * @throws \app\core\exceptions\PageNotFoundException
	 * @return mixed
	 */
	public function resolve()
	{
		// get path and method and call callback
		$path = Application::$App->Request->path();
		$method = Application::$App->Request->method();

		foreach ($this->routes[$method] as $route => $callback) {
			if (!$this->match($route, $path))
				continue;

			$parameters = $this->extract($route, $path);

			/**
			 * @var Controller $controller
			 */
			$controller = new $callback[0]();

			// process callback
			Application::$App->Controller = $controller;
			Application::$App->Controller->setAction($callback[1]);

			// TODO: check if user had access to this page using middlewares
			foreach (Application::$App->Controller->getMiddlewares() as $middleware) {
				$middleware->execute();
			}

			$callback[0] = $controller;

			return call_user_func($callback, $parameters);
		}

		// callback was not found. Throw error
		throw new PageNotFoundException;
	}
}
