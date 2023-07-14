<?php

namespace app\views\form;

class Textarea extends Field
{
	public function render(): string
	{
		return sprintf(
			'<textarea id="%s" name="%s" class="bg-transparent border-%s form-control pt-3 px-5 rounded-5" placeholder="%s" %s %s></textarea>',
			$this->name,
			$this->name,
			$this->color,
			$this->placeholder,
			$this->readonly ? 'readonly' : '',
			$this->required ? 'required' : ''
		);
	}
}
