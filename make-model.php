<?php
require_once __DIR__ . '/_Maker.php';

class _MakeModel extends _Maker
{
	protected function outputString(): string
	{
		return "Enter model name: ";
	}

	protected function classNameGenerator(string $input): string
	{
		return ucfirst(strtolower($input));
	}

	public function commandFileName(): string
	{
		return '_model';
	}
	public function classFilePath(): string
	{
		return 'models';
	}

	public function successMessage(): string
	{
		return "Model {$this->class} created successfully. You may create a migration for this model.";
	}

	public function __construct()
	{
		$this->run();
	}
}

new _MakeModel;
