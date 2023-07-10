<?php

namespace app\views\form;

abstract class Field
{
	public string $type;
	public string $name;
	public string $label;

	function __construct(string $name, ?string $label = null)
	{
		$this->name = $name;
		$this->label = is_null($label) ? ucfirst(strtolower($name)) : $label;
	}

	abstract public function render(): string;

	public function __toString()
	{
		return sprintf(
			'
			<label for="%s" class="form-label">%s</label>
			 %s
			<div class="invalid-feedback"></div>
		',
			$this->name,
			$this->label,
			$this->render(),
		);
	}
}
