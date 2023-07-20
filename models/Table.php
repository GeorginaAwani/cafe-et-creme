<?php

namespace app\models;

use app\core\db\DBModel;

class Table extends DBModel
{
	public static function tableName(): string
	{
		return 'tables';
	}

	public function attributes(): array
	{
		return ['number', 'capacity', 'is_available', 'position'];
	}

	private function positions()
	{
		return ['window', 'bar', 'booth', 'entrance', 'outdoor', 'kitchen', 'lounge'];
	}

	public function save()
	{
		$rules = [
			'number' => [self::RULE_REQUIRED, self::RULE_NUMERIC],
			'capacity' => [self::RULE_REQUIRED, self::RULE_NUMERIC, [self::RULE_MIN, 'min' => 1], [self::RULE_MAX, 'max' => 12]],
			'position' => [self::RULE_REQUIRED, [self::RULE_IN, $this->positions()]]
		];

		$this->validate($rules);

		return parent::save();
	}
}
