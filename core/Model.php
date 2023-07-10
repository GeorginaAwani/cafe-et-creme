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

	public function loadData(array $data = null)
	{
		// get request body
		if (!$data) $data = Application::$App->Request->body();

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
			self::RULE_PRICE => 'Price must be more than 0'
		];
	}

	private function throw_error(int $rule, array $params = [])
	{
		$message = $this->error_messages()[$rule] ?? '';

		foreach ($params as $key => $value) {
			$message = str_replace("{{$key}}", $value, $message);
		}

		throw new FormException($message);
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
						if (!$this->validate_existence($rule[1], $rule[2], $value))
							$error = true;
						break;
				}

				if ($error) {
					$this->throw_error($ruleName, ['field' => $attribute]);
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
		return !$this->validate_existence($attribute, $class::tableName(), $this->$attribute) ?? false;
	}
}
