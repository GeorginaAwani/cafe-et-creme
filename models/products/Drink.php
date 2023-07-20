<?php

namespace app\models\products;

use app\core\db\DBModel;

class Drink extends DBModel
{
	public string $name = '';
	public string $description = '';
	public float $price = 0.0;
	public int $category = 0;
	public bool $is_alcoholic = false;
	public int $quantity_in_store = 0;
	public array|string $image = [];

	public static function tableName(): string
	{
		return 'drinks';
	}

	public function attributes(): array
	{
		return ['name', 'description', 'price', 'category', 'is_alcoholic', 'image',];
	}

	public function save()
	{
		$rules = [
			'name' => [self::RULE_REQUIRED],
			'description' => [self::RULE_REQUIRED],
			'price' => [self::RULE_REQUIRED, self::RULE_PRICE],
			'category' => [
				self::RULE_REQUIRED,
				[self::RULE_EXISTS, 'column' => 'id', 'table' => 'category', 'record' => 'category']
			],
			'is_alcoholic' => [self::RULE_REQUIRED],
			'image' => [self::RULE_REQUIRED, self::RULE_IMAGE],
		];

		$this->validate($rules);

		$this->image = $this->saveFile($this->image);
		return parent::save();
	}
}
