<?php

namespace app\views\form;

use app\views\form\Select;

class Form
{
	public static function begin(string $id)
	{
		echo sprintf('<form method="POST" id="%s" enctype="multipart/form-data">', $id);
		return new Form;
	}

	public static function arrowButton(string $outlineClass, string $href, string $label)
	{
		return sprintf('<a href="%s" class="btn btn-lg px-5 py-4 rounded-pill btn-outline-%s btn-arrow position-relative" aria-label="%s"><i class="fa-angle-right fa-arrow-icon fa-light position-absolute top-50 translate-middle-y"></i></a>', $href, $outlineClass, $label);
	}

	public function startFieldset()
	{
		return '<fieldset>';
	}

	public function endFieldset()
	{
		return '</fieldset>';
	}

	public function legend(string $text)
	{
		return sprintf('<legend>%s</legend>', $text);
	}

	public function input(string $name, string $label = '', string $placeholder = '')
	{
		return new Input($name, $label, $placeholder);
	}

	public function textarea(string $name, string $label = '', string $placeholder = '')
	{
		return new Textarea($name, $label, $placeholder);
	}

	public function select(string $name, string $label = '')
	{
		return new Select($name, $label);
	}

	public function submit(string $text, string $outlineClass = 'primary')
	{
		return sprintf('<button type="submit" class="btn btn-arrow btn-lg fw-lighter btn-%s position-relative px-5 py-3 rounded-pill">%s<i class="fa-light fa-angle-right fa-arrow-icon text-%s position-absolute top-50 translate-middle-y"></i></button>', $outlineClass, $text, $outlineClass);
	}

	public function end()
	{
		echo '</form>';
	}
}
