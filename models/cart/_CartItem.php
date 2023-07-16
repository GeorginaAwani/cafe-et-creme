<?php

namespace app\models\cart;

use app\models\_View;

abstract class _CartItem extends _View
{
	public int $item_id = 0;

	public function get()
	{
		return $this->fetch("item_id = :item_id", [':item_id' => $this->item_id], null, $this->className());
	}
}
