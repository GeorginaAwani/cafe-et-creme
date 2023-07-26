<?php

namespace app\resources;

use app\core\Resource;
use app\models\products\Category;

class CategoryResource extends Resource
{

	public function toArray(): array
	{
		/** @var Category $model */
		$model = $this->model;
		return [
			'name' => $model->name,
			'description' => $model->description,
			'image' => $model->image,
		];
	}
}
