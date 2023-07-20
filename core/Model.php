<?php

namespace app\core;

use app\core\exceptions\FormException;

abstract class Model
{
	public const RULE_REQUIRED = 0;
	public const RULE_EMAIL = 1;
	public const RULE_UNIQUE = 2;
	public const RULE_IMAGE = 4;
	public const RULE_PRICE = 5;
	public const RULE_EXISTS = 6;
	public const RULE_NUMERIC = 7;
	public const RULE_MIN = 8;
	public const RULE_MAX = 9;
	public const RULE_MATCH = 10;
	public const RULE_IN = 11;
	public const RULE_DATETIME = 12;

	public function loadData()
	{
		// get request body
		$data = Application::$App->Request->body();

		foreach ($data as $key => $value) {
			if (property_exists($this, $key)) $this->$key = $value;
		}
	}

	/**
	 * Map rule names to error
	 */
	private function error_messages()
	{
		return [
			self::RULE_REQUIRED => '{field} is required',
			self::RULE_EMAIL => 'Invalid email address',
			self::RULE_UNIQUE => '{field} already exists',
			self::RULE_IMAGE => 'Invalid image file',
			self::RULE_PRICE => 'Price must be more than 0',
			self::RULE_EXISTS => '{record} not found',
			self::RULE_MAX => 'Must not exceed {max} characters',
			self::RULE_MIN => '{field} must be at least {min} characters',
			self::RULE_NUMERIC => '{field} must be a valid number',
			self::RULE_MATCH => 'Passwords must match',
			self::RULE_IN => 'Invalid {field} value',
			self::RULE_DATETIME => '{field} is an invalid time'
		];
	}

	private function throw_error(string $attribute, int $rule, array $params = [])
	{
		$message = $this->error_messages()[$rule] ?? '';

		foreach ($params as $key => $value) {
			$message = str_replace("{{$key}}", $value, $message);
		}

		throw new FormException("$attribute : " . ucfirst($message));
	}

	/**
	 * Validate input from user
	 */
	public function validate(array $rules): void
	{
		// iterate through defined rules
		foreach ($rules as $attribute => $rules) {
			$value = $this->$attribute;

			// iterate through rules for each attribute
			foreach ($rules as $rule) {
				// rule could be an array or string
				$ruleName = is_array($rule) ? $rule[0] : $rule;

				$error = false;

				switch ($ruleName) {
					case self::RULE_REQUIRED:
						if (!$value) $error = true;
						break;
					case self::RULE_EMAIL:
						if (!filter_var($value, FILTER_VALIDATE_EMAIL)) $error = true;
						break;
					case self::RULE_UNIQUE:
						if (!$this->validate_uniqueness($rule['class'], $rule['attribute'] ?? $attribute))
							$error = true;
						break;
					case self::RULE_IMAGE:
						if (!$this->validate_image($value))
							$error = true;
						break;
					case self::RULE_PRICE:
						if ($value <= 0.0)
							$error = true;
						break;
					case self::RULE_EXISTS:
						if (!$this->validate_existence($rule['column'], $rule['table'], $value))
							$error = true;
						break;
					case self::RULE_NUMERIC:
						if (!is_numeric($value))
							$error = true;
						break;
					case self::RULE_MIN:
						if (strlen($value) < $rule['min'])
							$error = true;
						break;
					case self::RULE_MAX:
						if (strlen($value) > $rule['max'])
							$error = true;
						break;
					case self::RULE_MATCH:
						$a = $rule['attribute'];
						if ($value !== $this->$a)
							$error = true;
						break;
					case self::RULE_IN:
						if (!in_array($value, $rule[1])) $error = true;
						break;
					case self::RULE_DATETIME:
						try {
							$time = new \DateTime($value);
							$now = new \DateTime;

							if (isset($rule['future']) && $time <= $now) {
								$error = true;
							}
						} catch (\Throwable $e) {
							$error = true;
						}

						break;
				}

				$errorRule = ['field' => str_replace('_', ' ', $attribute)];

				if (is_array($rule))
					$errorRule = array_merge($rule, $errorRule);

				if ($error) {
					$this->throw_error($attribute, $ruleName, $errorRule);
				}
			}
		}
	}

	private function validate_image(array $image)
	{
		// validate image type has "image"
		return strpos($image['type'], 'image') !== 0;
	}
	private function validate_existence(string $field, string $table, string $value)
	{
		$query = Application::$App->DB->prepare("SELECT NOW() FROM $table WHERE $field = :attr", [
			":attr" => $value
		]);

		$record = $query->fetchObject();
		return $record ?? false;
	}
	private function validate_uniqueness(string $class, string $attribute)
	{
		return (!$this->validate_existence($attribute, $class::tableName(), $attribute)) ?? false;
	}
}
