<?php

namespace app\core;

use app\core\Model;

abstract class Resource
{
	protected Model $model;

	function __construct(Model $model)
	{
		$this->model = $model;
	}
	abstract public function toArray(): array;

	public static function collection($resourceCollection)
	{
		return array_map(function ($resource) {
			return (new static($resource))->toArray();
		}, $resourceCollection);
	}
}
