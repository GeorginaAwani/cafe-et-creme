<?php

namespace app\core\exceptions;

use app\core\ResponseInterface;
use Exception;

abstract class UserException extends Exception implements ResponseInterface
{
	// abstract public function description(): string;
}
