<?php

namespace app\models\products;

use app\core\db\DBModel;

class Container extends DBModel
{
	public string $name = '';
	public string $description = '';
	public array|string $image = [];
	public float $price = 0.0;
	public static function tableName(): string
	{
		return 'containers';
	}

	public function attributes(): array
	{
		return ['name', 'description', 'price', 'image'];
	}

	public function primaryKeyField(): string
	{
		return 'id';
	}

	protected function rules(): array
	{
		return [
			'name' => [self::RULE_REQUIRED],
			'description' => [self::RULE_REQUIRED],
			'image' => [self::RULE_REQUIRED, self::RULE_IMAGE],
			'price' => [self::RULE_REQUIRED, self::RULE_PRICE]
		];
	}

	public function create()
	{
		$this->image = $this->saveFile($this->image);
		return parent::save();
	}
}
