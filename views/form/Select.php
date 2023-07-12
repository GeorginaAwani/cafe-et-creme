<?php

namespace app\views\form;

class Select extends Field
{
	private array $options = [];
	function __construct(string $name, ?string $label = null)
	{
		parent::__construct($name, $label, null);
	}
	public function addOption(string $text, string $value = null)
	{
		$this->options[] = [$text, $value ?? strtolower($value)];
		return $this;
	}

	private function get_options()
	{
		return implode(array_map(function ($option) {
			return sprintf("<option value='%s'>%s</option>", $option[1], $option[0]);
		}, $this->options));
	}
	public function render(): string
	{
		return sprintf(
			'<select id="%s" name="%s" class="bg-transparent border-primary form-control pt-3 px-5 rounded-pill">%s</select>',
			$this->name,
			$this->name,
			$this->get_options()
		);
	}
}
