<?php

namespace app\models\products;

use app\core\DBModel;
use app\resources\ContainerResource;

class Container extends DBModel
{
	public string $name = '';
	public string $description = '';
	public array|string $image = [];
	public float $price = 0.0;
	public static function table(): string
	{
		return 'containers';
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

		$this->image = $this->saveFile($this->image, 'containers');

		return parent::create();
	}

	/**
	Get a record of this model from database
	 **/
	public function get()
	{
		return ['container' => (new ContainerResource(parent::read()))->toArray()];
	}

	/**
	Edit an existing record of this model
	 **/
	public function edit()
	{
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
		return [
			'containers' => ContainerResource::collection(parent::all())
		];
	}
}
