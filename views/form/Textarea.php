<?php

namespace app\views\form;

class Textarea extends Field
{
	public function render(): string
	{
		return sprintf(
			'<textarea id="%s" name="%s" class="form-control"></textarea>',
			$this->name,
			$this->name,
		);
	}
}
