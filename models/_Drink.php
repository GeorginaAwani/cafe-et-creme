<?php

namespace app\models;

class _Drink extends _View
{
	public static function tableName(): string
	{
		return 'vw_drinks';
	}

	protected function className(): string
	{
		return Drink::class;
	}

	public function get()
	{
		return [
			'drink' => $this->fetchOne("id = :id", [':id' => $this->id], null, $this->className())
		];
	}
}
