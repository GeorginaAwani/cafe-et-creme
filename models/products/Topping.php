<?php

namespace app\models\products;

use app\core\DBModel;

class Topping extends DBModel
{
	public string $name = '';
	public string $description = '';
	public array|string $image = [];
	public float $price = 0.0;

	public static function table(): string
	{
		return 'toppings';
	}

	public function attributes(): array
	{
		return ['name', 'description', 'price', 'image'];
	}

	private function rules()
	{
		return [
			'name' => [],
			'description' => [],
			'image' => [self::RULE_IMAGE],
			'price' => [self::RULE_PRICE]
		];
	}

	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

		$this->image = $this->saveFile($this->image, 'toppings');
		return parent::create();
	}

	/**
	Get a record of this model from database
	 **/
	public function get()
	{
		return parent::read();
	}

	/**
	Edit an existing record of this model
	 **/
	public function edit()
	{
		$this->validate($this->rules());

		return parent::update();
	}

	/**
	Delete a record of this model
	 **/
	public function remove()
	{
		return parent::delete();
	}

	/**
	Get records of this model
	 **/
	public function retrieve()
	{
		return ['toppings' => parent::all()];
	}
}
