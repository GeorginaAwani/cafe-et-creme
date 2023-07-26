<?php

namespace app\resources;

use app\core\Resource;
use app\models\products\Topping;

class ToppingResource extends Resource
{

	public function toArray(): array
	{
		/** @var Topping $model */
		$model = $this->model;
		return [
			'id' => $model->id,
			'name' => $model->name,
			'description' => $model->description,
			'image' => $model->image,
			'price' => $model->price,
		];
	}
}
