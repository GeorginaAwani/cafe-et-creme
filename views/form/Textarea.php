<?php

namespace app\views\form;

class Textarea extends Field
{
	public function render(): string
	{
		return sprintf(
			'<textarea id="%s" name="%s" class="bg-transparent border-primary form-control pt-3 px-5 rounded-5"></textarea>',
			$this->name,
			$this->name,
		);
	}
}
