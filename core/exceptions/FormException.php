<?php

namespace app\core\exceptions;

class FormException extends UserException
{
	protected $code = self::STATUS_BAD_REQUEST;
}
