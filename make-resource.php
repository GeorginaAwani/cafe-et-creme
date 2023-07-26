<?php
require_once __DIR__ . '/_Maker.php';

class _MakeResource extends _Maker
{
	protected function outputString(): string
	{
		return "Enter resource name: ";
	}

	protected function classNameGenerator(string $input): string
	{
		return ucfirst(strtolower($input)) . 'Resource';
	}

	public function commandFileName(): string
	{
		return '_resource';
	}
	public function classFilePath(): string
	{
		return 'resources';
	}

	public function successMessage(): string
	{
		return "Resource {$this->class} created successfully.";
	}

	public function __construct()
	{
		$this->run();
	}
}

new _MakeResource;
