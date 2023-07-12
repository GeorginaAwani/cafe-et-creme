<?php

namespace app\views\form;

abstract class Field
{
	public string $type;
	public string $name;
	public string $label;
	public string $placeholder = '';

	function __construct(string $name, ?string $label = null, ?string $placeholder = null)
	{
		$this->name = $name;
		$this->label = is_null($label) ? ucfirst(strtolower($name)) : $label;
		$this->placeholder = $placeholder;
	}

	abstract public function render(): string;

	public function __toString()
	{
		return sprintf(
			'
			<label for="%s" class="form-label h4 mb-0 position-absolute px-3">%s</label>
			 %s
			<div class="invalid-feedback"></div>
		',
			$this->name,
			$this->label,
			$this->render(),
		);
	}
}
