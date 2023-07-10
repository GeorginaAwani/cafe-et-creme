<?php
require_once __DIR__ . '/_Maker.php';

class _MakeMigration extends _Maker
{
	protected function outputString(): string
	{
		return "Enter migration name: ";
	}

	protected function classNameGenerator(string $input): string
	{
		return 'm_' . time() . '_' . str_replace(' ', '_', $input);
	}

	public function commandFileName(): string
	{
		return '_migration';
	}
	public function classFilePath(): string
	{
		return 'migrations';
	}

	public function successMessage(): string
	{
		return "Migration {$this->class} created successfully";
	}

	public function __construct()
	{
		$this->run();
	}
}

new _MakeMigration;
