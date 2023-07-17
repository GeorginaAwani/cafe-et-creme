<?php

namespace app\core;

use app\core\db\Database;
use app\core\exceptions\UserException;
use app\models\User;

/**
 * The main method of the entire application
 */
class Application
{
	public Router $Router;
	public Request $Request;
	public Response $Response;
	public ?Controller $Controller = null;
	public Database $DB;
	public Session $Session;
	public View $View;

	public ?User $user = null;

	public static ?self $App = null;
	public static ?string $ROOT = null;

	public string $layout = 'main';
	public string $theme = 'light';

	public function __construct(string $root, ?string $userClass = null)
	{
		self::$ROOT = $root;
		self::$App = $this;

		$this->Request = new Request;
		$this->Router = new Router;
		$this->Response = new Response;
		$this->DB = new Database;
		$this->Session = new Session;
		$this->View = new View;

		if ($userClass) {
			/** @var User $user */
			$user = new $userClass;
			// get user from session
			$id = $this->Session->get('user');
			if ($id) {
				$uid = $user->fetchOne("id = :id", [':id' => $id]);
				if ($uid)
					$this->user = $uid;
			}
		}
	}

	public function run()
	{
		$this->Router->resolve();
	}

	public static function isGuest()
	{
		return !self::$App->user;
	}

	public function auth(User $user)
	{
		// save user in session
		$this->user = $user;
		$this->Session->set('user', $user->id);

		return true;
	}
}
