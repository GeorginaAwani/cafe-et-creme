<?php

namespace app\models;

use app\core\db\DBModel;

/**
 * Model formed from a view
 * @author Georgina Awani
 * @copyright (c) 2023
 */
abstract class _View extends DBModel
{
	/**
	 * Base table this view is derived from
	 * @return string
	 */
	abstract protected function className(): string;

	public function attributes(): array
	{
		return [];
	}
}
