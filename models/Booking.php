<?php

namespace app\models;

use app\core\DBModel;

class Booking extends DBModel
{
	public int $user_id;
	public int $table_id;
	public string $booking_time;
	public int $no_of_guests;

	public static function table(): string
	{
		return 'bookings';
	}

	public function attributes(): array
	{
		return [
			'user_id', 'table_id', 'booking_time', 'no_of_guests'
		];
	}

	private function rules()
	{
		return [
			'table_id' => [[self::RULE_EXISTS, 'table' => 'tables', 'column' => 'id']],
			'booking_time' => [[self::RULE_DATETIME, 'future' => true]],
			'no_of_guests' => [self::RULE_NUMERIC, [self::RULE_MIN, 'min' => 1], [self::RULE_MAX, 'max' => 12]],
		];
	}

	/**
	Create a new record of this model
	 **/
	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

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
		return parent::all();
	}
}
