<?php

namespace app\models;

use app\core\Application;
use app\core\exceptions\FormException;
use app\core\Model;
use app\models\User;

class Login extends Model
{
	public string $email = '';
	public string $password = '';

	public function login(User $User): bool
	{
		$rules = [
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'password' => [self::RULE_REQUIRED]
		];

		$this->validate($rules);

		$user = $User->fetchOne("email = :email", [':email' => $this->email]);

		if (!$user || !password_verify($this->password, $user->password)) {
			throw new FormException("Invalid log in credentials");
		}

		return Application::$App->auth($user);
	}
}
