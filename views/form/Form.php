<?php

namespace app\views\form;

class Form
{
	public static function begin()
	{
		echo '<form method="POST" enctype="multipart/form-data">';
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

	public function field($attribute)
	{
		return new Input($attribute);
	}

	public function textarea($attribute)
	{
		return new Textarea($attribute);
	}

	public function submit(string $text, string $class = 'primary')
	{
		echo sprintf('<button type="submit" class="btn btn-%s">%s</button>', $class, $text);
	}

	public static function end()
	{
		echo '</form>';
	}
}
