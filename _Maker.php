<?php
abstract class _Maker
{
	protected $class;

	/**
	 * This is the command displayed at the beginning to receive user input
	 * @return string
	 */
	abstract protected function outputString(): string;

	/**
	 * Receives user input and generates class name
	 * @param string $inputData
	 * @return string
	 */
	abstract protected function classNameGenerator(string $inputData): string;

	/**
	 * Name of command template file from which the class will be made
	 * @return string
	 */
	abstract protected function commandFileName(): string;

	/**
	 * Path to folder where class and file will be created
	 * @return string
	 */
	abstract protected function classFilePath(): string;

	/**
	 * Success message
	 * @return string
	 */
	protected function successMessage(): string
	{
		return "{$this->class} created successfully";
	}

	final protected function run()
	{
		echo $this->outputString();

		// get input from console
		$input = readline();

		// generate class name
		$this->class = $this->classNameGenerator($input);

		// read command template
		$template = file_get_contents("commands/{$this->commandFileName()}.txt");
		// replace class name
		$content = str_replace('{{CLASS}}', $this->class, $template);

		// create file
		$file = "{$this->classFilePath()}/{$this->class}.php";
		file_put_contents($file, $content);

		echo $this->successMessage();

		// exec("open $file"); // MAC
		exec("start $file"); // WINDOWS
		// exec("xdg-open $file"); // LINUX
	}
}
