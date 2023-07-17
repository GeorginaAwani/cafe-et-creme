<?php

namespace app\models;

use app\core\db\DBModel;

class Category extends DBModel
{
	public string $name = '';
	public string $description = '';

	public static function tableName(): string
	{
		return 'categories';
	}

	public function attributes(): array
	{
		return ['id', 'name', 'description'];
	}

	public function save()
	{

		return parent::save();
	}
}
