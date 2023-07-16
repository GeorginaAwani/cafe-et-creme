<?php

namespace app\models;

use app\core\db\DBModel;

class Category extends DBModel
{
	public static function tableName(): string
	{
		return 'category';
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
