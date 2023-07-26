<?php

namespace app\resources;

use app\core\Resource;
use app\models\products\_Drink;

class DrinkResource extends Resource
{

	public function toArray(): array
	{
		/** @var _Drink $model */
		$model = $this->model;
		return [
			'id' => $model->id,
			'name' => $model->name,
			'description' => $model->description,
			'image' => $model->image,
			'price' => $model->price,
			'category' => $model->category,
			'isAlcoholic' => $model->is_alcoholic,
			'quantityInStore' => $model->quantity_in_store,
			'quantityInCart' => $model->quantity_in_cart,
		];
	}
}
