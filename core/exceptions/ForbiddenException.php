<?php

namespace app\core\exceptions;

class ForbiddenException extends UserException
{
	protected $code = self::STATUS_FORBIDDEN;
	protected $message = "You're not logged in";

	public function description(): string
	{
		return "You have to log in to your account to view this page";
	}
}
