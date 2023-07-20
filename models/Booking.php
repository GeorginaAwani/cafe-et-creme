<?php

namespace app\models;

use app\core\db\DBModel;

class Booking extends DBModel
{
	public int $user_id;
	public int $table_id;
	public string $booking_time;
	public int $no_of_guests;

	public static function tableName(): string
	{
		return 'bookings';
	}

	public function attributes(): array
	{
		return [
			'user_id', 'table_id', 'booking_time', 'no_of_guests'
		];
	}

	public function save()
	{
		$rules = [
			'table_id' => [
				self::RULE_REQUIRED, [self::RULE_EXISTS, 'column' => 'id', 'table' => 'tables']
			],
			'booking_time' => [
				self::RULE_REQUIRED, [self::RULE_DATETIME, 'future' => true]
			],
			'no_of_guests' => [
				self::RULE_REQUIRED, self::RULE_NUMERIC, [self::RULE_MIN, 'min' => 1], [self::RULE_MAX, 'max' => 12]
			]
		];

		return parent::save();
	}
}
