<?php

namespace app\core;

use PDO;
use app\core\db\Database;

abstract class DBModel extends Model
{
	public int $id;
	public string $search = '';
	public int $page = 1;

	/**
	 * Name of corresponding database table
	 * @return string
	 */
	abstract static public function table(): string;

	/**
	 * The attributes listed here can be inserted into the database
	 */
	abstract protected function attributes(): array;

	/**
	 * Returns current database connection
	 * @return \app\core\db\Database
	 */
	protected function db(): Database
	{
		return Application::$App->DB;
	}

	/**
	 * Get page maps
	 */
	protected function pageMap()
	{
		return [
			'prev' => ($this->page - 1),
			'current' => $this->page,
			'next' => ($this->page + 1),
		];
	}

	/**
	 * Get a map of attributes and their values
	 * @return array
	 */
	private function attribute_map(): array
	{
		$attributes = $this->attributes();

		$values = array_map(function ($attribute) {
			return $this->$attribute;
		}, $attributes);

		return array_combine($attributes, $values);
	}

	/**
	 * Convert an array of columns to an SQL clause
	 * @return string
	 */
	private function column_string(array $columns, string $separator = ' AND '): string
	{
		return implode($separator, array_map(function ($column) {
			return "$column : :$column";
		}, $columns));
	}

	/**
	 * Create a new record of this model in the corresponding table
	 * @return bool|string
	 */
	protected function create()
	{
		try {
			$params = $this->attribute_map();

			return $this->db()->insert($this->table(), $params);
		} catch (\Throwable $th) {
			throw $th;
		}
	}

	/**
	 * Create a record
	 */
	abstract function new();

	/**
	 * Fetch one or more records from database
	 * @param mixed $where
	 * @param mixed $params
	 * @param mixed $columns
	 * @param mixed $others
	 * @return \PDOStatement|bool
	 */
	private function get_from_table(?string $where = null, ?array $params = null, ?array $columns = null, ?array $others = []): \PDOStatement|bool
	{
		$columns = is_null($columns) ? '*' : implode(', ', $columns);

		if (!$where) {
			$where = "1 IS TRUE";
			$params = [];
		}

		$sql = "SELECT $columns FROM " . self::table() . " WHERE $where";

		if (!empty($others)) {
			$otherSQL = ' ';
			foreach ($others as $name => $value) {
				$otherSQL .= $name . ' ' . $value;
			}

			$sql .= $otherSQL;
		}

		return $this->db()->prepare($sql, $params);
	}

	/**
	 * Get a record by id
	 * @return \PDOStatement|bool
	 */
	protected function read(): \PDOStatement|bool
	{
		return $this->get_from_table("id = :id", [
			':id' => $this->id
		], null);
	}

	/**
	 * Read a reocrd
	 */
	abstract public function get();

	/**
	 * Get multiple records from table
	 * @param mixed $where
	 * @param mixed $params
	 * @param mixed $columns
	 * @return array
	 */
	protected function all(?string $where = null, ?array $params = null, ?array $columns = null, ?array $others = []): array
	{
		return $this->get_from_table($where, $params, $columns, $others)->fetchAll(PDO::FETCH_CLASS, static::class);
	}

	/**
	 * Get all
	 */
	abstract public function retrieve();

	/**
	 * Update a database record by id
	 * @return \PDOStatement|bool
	 */
	protected function update(): \PDOStatement|bool
	{
		$fillable = $this->attributes();

		$filled = [];

		foreach ($fillable as $attribute) {
			if ($this->$attribute)
				$filled[$attribute] = $this->$attribute;
		}

		list($map, $columns) = $this->db()->getQueryData($filled);
		$map[':id'] = $this->id;

		$sql = "UPDATE {$this->table()} SET {$this->column_string($columns, ',')} WHERE id = :id";

		return $this->db()->prepare($sql, $map);
	}

	/**
	 * Update record
	 */
	abstract public function edit();


	/**
	 * Delete a record by id
	 * @return \PDOStatement|bool
	 */
	protected function delete(): \PDOStatement|bool
	{
		return $this->db()->delete($this->table(), 'id = :id', [
			':id' => $this->id
		]);
	}

	/**
	 * Delete record
	 */
	abstract public function remove();

	/**
	 * Save a file to the filesystem
	 * @param array $image
	 * @param string $path
	 * @return string
	 */
	protected function saveFile(array $image, string $path): string
	{
		$file = "images/$path/" . md5(uniqid(mt_rand(0, 100000))) . '.' . pathinfo($image['name']);

		move_uploaded_file($image['tmp_name'], Application::$ROOT . "/public/$file");

		return $file;
	}
}
