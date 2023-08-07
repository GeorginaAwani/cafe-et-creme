<?php

namespace app\models\products;

use app\resources\CategoryResource;
use app\core\DBModel;

class Category extends DBModel
{
	public string $name = '';
	public string $description = '';
	public string|array $image = [];

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
			'description' => [],
			'image' => [self::RULE_IMAGE],
		];
	}

	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

		$this->image = $this->saveFile($this->image, 'categories');

		return $this->create();
	}

	public function get()
	{
		return (new CategoryResource($this->all("name = :name", [
			':name' => $this->name
		])[0]))->toArray();
	}

	public function edit()
	{
	}

	public function retrieve()
	{
		$categories = CategoryResource::collection($this->all());
		return ['categories' => $categories];
	}

	public function remove()
	{
	}
}
