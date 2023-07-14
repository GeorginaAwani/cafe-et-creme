<?php

namespace app\views\form;


class Input extends Field
{
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_SEARCH = 'search';
	public const TYPE_EMAIL = 'email';
	public const TYPE_TEL = 'tel';

	function __construct(string $name, string $label = '', string $placeholder = '')
	{
		$this->type = self::TYPE_TEXT;
		parent::__construct($name, $label, $placeholder);
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

	public function phoneField()
	{
		$this->type = self::TYPE_TEL;
		return $this;
	}

	public function searchField()
	{
		$this->type = self::TYPE_SEARCH;
		return $this;
	}

	private function password_button()
	{
		if ($this->type != self::TYPE_PASSWORD)
			return '';

		return '<button type="button" class="border-0 btn end-0 me-4 p-1 password-switch position-absolute top-50 translate-middle-y"><i class="fa-regular fa-eye"></i></button>';
	}

	public function render(): string
	{
		return sprintf(
			'<input type="%s" id="%s" name="%s" class="bg-transparent border-%s form-control pt-3 px-5 rounded-pill" placeholder="%s" %s %s>%s',
			$this->type,
			$this->name,
			$this->name,
			$this->color,
			$this->placeholder,
			$this->readonly ? 'readonly' : '',
			$this->required ? 'required' : '',
			$this->password_button(),
		);
	}
}
