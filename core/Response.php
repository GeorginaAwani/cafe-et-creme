<?php

namespace app\core;

use app\core\exceptions\UserException;
use Exception;

/**
 * Handles user requests
 */
class Response implements ResponseInterface
{
	public function sendSuccess(array $data, $status = self::STATUS_OK)
	{
		$this->_send($data, $status);
	}

	public function sendError($error)
	{
		if ($error instanceof UserException) {
			$code = $error->getCode();
			$message = $error->getMessage();
		} else {
			$code = self::STATUS_INTERNAL_SERVER_ERROR;
			$message = is_string($error) ? $error : "Something went wrong";
		}

		$this->_send(['error' => $message], $code);
	}

	private function _send(array $data, int $status)
	{
		http_response_code($status);
		header('Content-Type: application/json');
		die(json_encode($data));
	}
}
