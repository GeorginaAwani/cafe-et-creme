<?php

/**
 * Base class for all controllers. Controllers handle rendering of views and processing of requests
 */

namespace app\core;

abstract class Controller
{
	protected string $layout = 'main';
	protected string $action = '';
	protected bool $render = false;
	protected array $middlewares = [];

	/**
	 * Renders a page
	 */
	protected function render(string $view, array $params = [])
	{
		return Application::$App->View->render($view, $params);
	}

	/**
	 * Return a response
	 */
	protected function process()
	{
		die(Application::$App->Response->send());
	}

	protected function response()
	{
		return Application::$App->Response;
	}

	protected function request()
	{
		return Application::$App->Request;
	}

	public function setLayout(string $layout)
	{
		$this->layout = $layout;
	}

	public function getLayout()
	{
		return $this->layout;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function setAction(string $action)
	{
		$this->action = $action;
	}

	public function setRender(bool $render)
	{
		$this->render = $render;
	}

	public function getRender()
	{
		return $this->render;
	}

	public function registerMiddleware(Middleware $middleware)
	{
		$this->middlewares[] = $middleware;
	}

	public function getMiddlewares()
	{
		return $this->middlewares;
	}
}
