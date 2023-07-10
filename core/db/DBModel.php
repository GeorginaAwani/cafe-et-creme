<?php

namespace app\core\db;

use PDO;
use Exception;
use app\core\Model;
use app\core\Application;

/**
 * Models that represent database tables extend this class
 */
abstract class DBModel extends Model
{
	/**
	 * Primary key of this model
	 * @var int
	 */
	public int $id = 0;
	abstract static public function tableName(): string;

	abstract public function attributes(): array;

	protected function db(): Database
	{
		return Application::$App->DB;
	}

	/**
	 * Returns a map of attributes and values
	 * @return array
	 */
	private function map_attributes()
	{
		$attributes = $this->attributes();
		$values = array_map(function ($element) {
			return $this->$element;
		}, $attributes);

		return array_combine($attributes, $values);
	}

	/**
	 * Create a new record of this model in the corresponding table
	 * @return bool|string
	 */
	protected function save()
	{
		try {
			$params = $this->map_attributes();

			return $this->db()->insert($this->tableName(), $params);
		} catch (\Throwable $th) {
			throw $th;
			// return false;
		}
	}

	protected function updateByKey(array $params)
	{
		list($map, $columns) = $this->db()->getQueryData($params);
		$map[':id'] = $this->id;

		$sql = "UPDATE " . $this->tableName() . " SET " . $this->stringColumns($columns, ',') . " WHERE id = :id";
		return $this->db()->prepare($sql, $map);
	}

	/**
	 * Delete a record by primaryKey
	 * @param mixed $key
	 * @return \PDOStatement|bool
	 */
	protected function deleteByKey()
	{
		return $this->db()->delete($this->tableName(), 'id = :id', [':id' => $this->id]);
	}

	protected function stringColumns(array $columns, string $concatWith = ' AND ')
	{
		$string = array_map(function ($column) {
			return "$column = :$column";
		}, $columns);

		return implode($concatWith, $string);
	}

	protected function deleteByAttributes()
	{
		list($set, $columns) = $this->db()->getQueryData($this->map_attributes());

		return $this->db()->delete($this->tableName(), $this->stringColumns($columns), $set);
	}

	private function _getFromTable(string $where, array $params, ?array $columns = null, ?array $others = [])
	{
		$table = static::tableName();

		$columns = is_null($columns) ? '*' : implode(', ', $columns);

		$sql = "SELECT $columns FROM $table WHERE $where";
		if (!empty($others)) {
			foreach ($others as $name => $value) {
				$sql .= $name . ' ' . $value;
			}
		}
		return $this->db()->prepare($sql, $params);
	}

	/**
	 * Get one record from table
	 * @param string $where
	 * @param array $params
	 * @param array $columns
	 * @return bool|object
	 */
	public function fetchOne(string $where, array $params, array $columns = null)
	{
		return $this->_getFromTable($where, $params, $columns, ['LIMIT' => 1])->fetchObject(static::class);
	}

	/**
	 * Get multiple records from table
	 * @param string $where
	 * @param array $params
	 * @param array $columns
	 * @return array
	 */
	public function fetch(string $where, array $params, ?array $columns = null, string $class = null)
	{
		if (is_null($class))
			$class = static::class;
		return $this->_getFromTable($where, $params, $columns)->fetchAll(PDO::FETCH_CLASS, $class);
	}

	protected function saveFile(array $image): string
	{
		$file = 'images/' . md5(uniqid(mt_rand(0, 100000))) . '.' . pathinfo($image['name']);

		move_uploaded_file($image['tmp_name'], Application::$ROOT . "/public/$file");

		return $file;
	}
}
