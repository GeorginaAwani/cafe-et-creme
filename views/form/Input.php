<?php

namespace app\views\form;


class Input extends Field
{
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_SEARCH = 'search';
	public const TYPE_EMAIL = 'email';

	function __construct(string $name, string $label = null)
	{
		$this->type = self::TYPE_TEXT;
		parent::__construct($name, $label);
	}

	public function passwordField()
	{
		$this->type = self::TYPE_PASSWORD;
		return $this;
	}

	public function emailField()
	{
		$this->type = self::TYPE_EMAIL;
		return $this;
	}

	public function render(): string
	{
		return sprintf(
			'<input type="%s" id="%s" name="%s" class="form-control">',
			$this->type,
			$this->name,
			$this->name,
		);
	}
}
