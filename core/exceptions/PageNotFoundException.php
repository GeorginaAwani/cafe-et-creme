<?php

namespace app\core\exceptions;

class PageNotFoundException extends UserException
{
	protected $code = 404;
	protected $message = "Looks like you're lost";

	public function description(): string
	{
		return "We couldn't find the page you were looking for. Try something else";
	}
}
