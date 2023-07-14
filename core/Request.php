<?php

namespace app\core;

/**
 * The Request class reads the user request
 */
class Request
{
	private const REQUEST_GET = 'get';
	private const REQUEST_POST = 'post';
	private const REQUEST_PUT = 'put';
	private const REQUEST_DELETE = 'delete';
	/**
	 * Get URI path
	 */
	public function path(): string
	{
		// we use REQUEST_URI instead of PATH_INFO because the latter is not available in some environments
		$path = $_SERVER['REQUEST_URI'] ?? '/';
		$pos = strpos($path, '?');

		return !$pos ? $path : substr($path, 0, $pos);
	}

	/**
	 * Check if request ian ajax request
	 */
	public function isAjaxRequest()
	{
		return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
	}

	/**
	 * Get search query
	 * @return array<string>
	 */
	public function query()
	{
		$string = $_SERVER['QUERY_STRING'] ?? '';
		$pairs = explode('&', $string);

		$query = [];

		foreach ($pairs as $pair) {
			$separator = strpos($pair, '=');
			$key = substr($pair, 0, $separator);
			$value = substr($pair, ($separator + 1));
			$query[$key] = $value;
		}

		return $query;
	}

	/**
	 * Get request method
	 * @return string
	 */

	public function method(): string
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	public function isGet(): bool
	{
		return $this->method() === self::REQUEST_GET;
	}

	public function isPost(): bool
	{
		return $this->method() === self::REQUEST_POST;
	}

	public function isDelete(): bool
	{
		return $this->method() === self::REQUEST_DELETE;
	}

	public function isPut(): bool
	{
		return $this->method() === self::REQUEST_PUT;
	}

	public function body(): array
	{
		$body = [];

		$method = $this->method();

		switch ($method) {
			case self::REQUEST_GET:
				$global = $_GET;
				$type = INPUT_GET;
				break;
			case self::REQUEST_POST:
				$global = $_POST;
				$type = INPUT_POST;
				break;
			case self::REQUEST_PUT:
			case self::REQUEST_DELETE:
				parse_str(file_get_contents("php://input"), $global);
				$type = null;
				break;
			default:
				return $body;
		}

		// get any attached files
		foreach ($_FILES as $key => $value) {
			$body[$key] = $value;
		}

		// different sanitisation for delete and put values
		if (is_null($type)) {
		} else {
			foreach ($global as $key => $value) {
				$body[$key] = filter_input($type, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}

		return $body;
	}
}
