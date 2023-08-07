<?php

namespace app\models\products;

use app\resources\DrinkResource;
use PDO;
use app\core\DBModel;
use app\core\Application;
use app\models\cart\Cart;

class Drink extends DBModel
{
	public string $name = '';
	public string $description = '';
	public float $price = 0.0;
	public int|string $category = '';
	public bool $is_alcoholic = false;
	public int $quantity_in_store = 0;
	public array|string $image = [];

	public static function table(): string
	{
		return 'drinks';
	}

	public function attributes(): array
	{
		return ['name', 'description', 'price', 'category', 'is_alcoholic', 'image',];
	}

	private function rules()
	{
		return [
			'name' => [],
			'description' => [],
			'price' => [self::RULE_PRICE],
			'category' => [
				[self::RULE_EXISTS, 'column' => 'id', 'table' => 'category', 'record' => 'category']
			],
			'is_alcoholic' => [],
			'image' => [self::RULE_IMAGE],
		];
	}

	public function new()
	{
		$this->validate($this->makeRequired($this->rules()));

		$this->image = $this->saveFile($this->image, 'drinks');

		return parent::create();
	}

	/**
	Get a record of this model from database
	 **/
	public function get()
	{
		$Cart = new Cart;
		$cartId = $Cart->retrieve();

		$sql = "CALL GetDrinkAgainstCart($cartId, {$this->id})";

		$query = Application::$App->DB->query($sql);

		return [
			'drink' => (new DrinkResource($query->fetchObject(_Drink::class)))->toArray(),
		];
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
		$Cart = new Cart;
		$cartId = $Cart->retrieve();

		$category = $this->category ?? 'NULL';
		$search = $this->search ?? 'NULL';
		$offset = ($this->page * 15) - 15;

		$sql = "CALL GetDrinksAgainstCart($cartId, '$category', '$search', $offset)";

		$query = $this->db()->query($sql);

		return [
			'drinks' => DrinkResource::collection($query->fetchAll(PDO::FETCH_CLASS, _Drink::class)),
			'pages' => $this->pageMap()
		];
	}
}
