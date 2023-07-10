<?php

namespace app\core;

use app\core\exceptions\PageNotFoundException;

class View
{
	protected string $title = '';

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle(string $title)
	{
		$this->title = $title;
	}

	/**
	 * Render a view and layout
	 */
	public function render(string $path, array $params = [])
	{
		try {
			$view = $this->get_view($path, $params);

			$content = [
				'{{CONTENT}}' => $view,
				'{{THEME}}' => Application::$App->theme
			];

			$layout = $this->get_layout();

			$search = array_keys($content);
			$replace  = array_values($content);

			return str_replace($search, $replace, $layout);
		} catch (\Throwable $e) {
			throw $e;
		}
	}

	/**
	 * Get related layout
	 */
	private function get_layout()
	{
		$layout = Application::$App->Controller ? Application::$App->Controller->getLayout() : Application::$App->layout;

		ob_start();
		include_once Application::$ROOT . "/views/layouts/$layout.php";

		return ob_get_clean();
	}

	/**
	 * Get the requested view
	 */
	private function get_view(string $path, array $params)
	{
		foreach ($params as $key => $value) {
			$$key = $value; // double $$ creates a new variable
		}

		$path = Application::$ROOT . "/views/$path.php";

		if (!file_exists($path)) throw new PageNotFoundException();

		ob_start();
		include_once $path;
		return ob_get_clean();
	}
}
