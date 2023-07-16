<?php

namespace app\core;

class SeederDataArray
{
	public string $name;
	public string $description;
	public ?string $image = null;
	public ?float $price = null;

	public function name(string $name)
	{
		$this->name = $name;
		return $this;
	}

	public function description(string $description)
	{
		$this->description = $description;
		return $this;
	}

	public function image(string $image)
	{
		$this->image = $image;
		return $this;
	}

	public function price(float $price)
	{
		$this->price = $price;
		return $this;
	}

	public function map()
	{
		$map = [
			'name' => $this->name,
			'description' => $this->description,
		];

		if (!is_null($this->image))
			$map['image'] = $this->image;

		if (!is_null($this->price))
			$map['price'] = $this->price;

		return $map;
	}
}
