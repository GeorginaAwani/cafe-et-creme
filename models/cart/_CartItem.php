<?php

namespace app\models\cart;

use app\core\db\DBModel;

abstract class _CartItem extends DBModel
{
	public int $item_id = 0;

	public function primaryKeyField(): string
	{
		return 'id';
	}

	public function attributes(): array
	{
		return ['item_id', 'id'];
	}

	protected function rules(): array
	{
		return [];
	}

	abstract protected function className(): string;

	public function get()
	{
		return $this->fetch("item_id = :item_id", [':item_id' => $this->item_id], null, $this->className());
	}
}
