<?php

namespace app\resources;

use app\core\Resource;
use app\models\products\Container;

class ContainerResource extends Resource
{
	public function toArray(): array
	{
		/**
		 * @var Container $model
		 */
		$model = $this->model;

		return [
			'id' => $model->id,
			'name' => $model->name,
			'description' => $model->description,
			'image' => $model->image,
			'price' => $model->price
		];
	}
}
