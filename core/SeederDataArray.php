<?php

namespace app\core;

use app\core\DBModel;

class SeederDataArray
{
	private DBModel $model;
	public string $name;
	public string $description;
	public ?string $image = null;
	public ?float $price = null;

	public function __construct(DBModel $model)
	{
		$this->model = $model;
	}

	public function set(string $property, string|int|float $value)
	{
		$this->model->$property = $value;
		return $this;
	}

	public function map()
	{
		$attributes = $this->model->attributes();
		$values = array_map(function ($attribute) {
			return $this->model->$attribute;
		}, $attributes);

		return array_combine($attributes, $values);
	}
}
