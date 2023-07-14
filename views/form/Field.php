<?php

namespace app\views\form;

abstract class Field
{
	public string $type;
	public string $name;
	public string $label;
	public string $placeholder = '';
	public bool $required = false;
	public bool $readonly = false;
	/**
	 * Color of border
	 * @var string
	 */
	public string $color = 'primary';

	function __construct(string $name, ?string $label = null, ?string $placeholder = null)
	{
		$this->name = $name;
		$this->label = is_null($label) ? ucfirst(strtolower($name)) : $label;
		$this->placeholder = $placeholder;
	}

	abstract public function render(): string;

	public function color(string $color)
	{
		$this->color = $color;
		return $this;
	}

	/**
	 * Set field to be required
	 * @return Field
	 */
	public function required()
	{
		$this->required = true;
		return $this;
	}

	/**
	 * Set field to be readonly
	 * @return Field
	 */
	public function readonly()
	{
		$this->required = true;
		return $this;
	}

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
