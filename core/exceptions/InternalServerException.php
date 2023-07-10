<?php

namespace app\core\exceptions;

class InternalServerException extends UserException
{
	protected $code = 500;
	protected $message = "Oops!";

	public function description(): string
	{
		return "Something went wrong. Please try again later";
	}
}
