<?php
require_once __DIR__ . '/_Maker.php';

class _MakeController extends _Maker
{
	protected function outputString(): string
	{
		return "Enter controller name: ";
	}

	protected function classNameGenerator(string $input): string
	{
		return ucfirst(strtolower($input)) . 'Controller';
	}

	public function commandFileName(): string
	{
		return '_controller';
	}
	public function classFilePath(): string
	{
		return 'controllers';
	}

	public function successMessage(): string
	{
		return "Controller {$this->class} created successfully.";
	}

	public function __construct()
	{
		$this->run();
	}
}

new _MakeController;
