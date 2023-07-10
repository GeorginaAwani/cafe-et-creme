<?php

namespace app\core\middlewares;

use app\core\Application;
use app\core\exceptions\ForbiddenException;
use app\core\Middleware;

/**
 * The AuthMiddleware validates a user is logged in to access a route action
 * @author Georgina Awani
 * @copyright (c) 2023
 */
class AuthMiddleware extends Middleware
{
	public array $actions = [];

	/**
	 * Actions passed need authentication. Empty action indicates the entire controller needs authentication
	 */
	public function __construct(array $actions = [])
	{
		$this->actions = $actions;
	}

	public function execute()
	{
		if (Application::isGuest()) {
			if (empty($this->actions) || in_array(Application::$App->Controller->getAction(), $this->actions)) {
				throw new ForbiddenException();
			}
		}
	}
}
