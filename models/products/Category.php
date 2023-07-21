<?php

namespace app\models\products;

use app\core\DBModel;

class Category extends DBModel
{
	public string $name = '';
	public string $description = '';
	public string $image = '';

	public static function table(): string
	{
		return 'categories';
	}

	protected function attributes(): array
	{
		return ['name', 'description'];
	}

	private function rules()
	{
		return [
			'name' => [],
			'description' => []
		];
	}

	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

		$this->create();
	}

	public function get()
	{
		return $this->all("name = :name", [
			':name' => $this->name
		])[0];
	}

	public function edit()
	{
	}

	public function retrieve()
	{
		return $this->all();
	}

	public function remove()
	{
	}
}
