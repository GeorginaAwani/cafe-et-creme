<?php

namespace app\models\products;

use app\core\db\DBModel;

class Topping extends DBModel
{
	public string $name = '';
	public string $description = '';
	public array|string $image = [];
	public float $price = 0.0;
	public static function tableName(): string
	{
		return 'toppings';
	}

	public function attributes(): array
	{
		return ['name', 'description', 'price', 'image'];
	}

	public function save()
	{
		$rules = [
			'name' => [self::RULE_REQUIRED],
			'description' => [self::RULE_REQUIRED],
			'image' => [self::RULE_REQUIRED, self::RULE_IMAGE],
			'price' => [self::RULE_REQUIRED, self::RULE_PRICE]
		];

		$this->validate($rules);

		$this->image = $this->saveFile($this->image);
		return parent::save();
	}
}
