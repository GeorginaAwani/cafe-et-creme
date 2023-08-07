<?php

namespace app\models;

use PDO;
use app\core\DBModel;
use app\models\products\Drink;

class PopularDrinks extends DBModel
{
	public static function table(): string
	{
		return 'drinks';
	}

	public function attributes(): array
	{
		return [];
	}

	/**
	Create a new record of this model
	 **/
	public function new()
	{
		// return '';
	}

	/**
	Get a record of this model from database
	 **/
	public function get()
	{
		// return parent::read();
	}

	/**
	Edit an existing record of this model
	 **/
	public function edit()
	{
		// return parent::update();
	}

	/**
	Delete a record of this model
	 **/
	public function remove()
	{
		// return parent::delete();
	}

	/**
	Get records of this model
	 **/
	public function retrieve(int $limit = 3)
	{
		$sql = "SELECT id, name, description, image, price FROM drinks ORDER BY RAND() LIMIT $limit";

		$query = $this->db()->query($sql);

		return [
			'drinks' => $query->fetchAll(PDO::FETCH_CLASS, Drink::class)
		];
	}
}
