<?php

namespace app\core\db;

class DatabaseField
{
	const INT = 'INT';
	const TINYINT = 'TINYINT';
	const DECIMAL = 'DECIMAL';
	const VARCHAR = 'VARCHAR';
	const TEXT = 'TEXT';
	const TIMESTAMP = 'TIMESTAMP';
	const BOOLEAN = 'BOOLEAN';
	const ENUM = 'ENUM';

	public string $name;
	public string $type;
	public int|string|null $size = null;
	public bool $nullable = false;
	public bool $primaryKey = false;
	// public bool $isTimestamp;
	public bool $unique = false;
	public ?string $default = null;
	/**
	 * [field, table]
	 * @var 
	 */
	public ?array $foreignKey = null;

	public ?array $enum = null;

	/**
	 * Set field name
	 * @param string $name
	 * @return DatabaseField
	 */
	public function name(string $name)
	{
		$this->name = $name;
		return $this;
	}

	private function set(string $name, string $type)
	{
		$this->name = $name;
		$this->type = $type;
		return $this;
	}

	public function enum(...$values)
	{
		$this->enum = $values;
		return $this;
	}

	/**
	 * Set field type
	 * @param int $type
	 * @return DatabaseField
	 */
	public function type(string $type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * Set field size
	 * @param int|string $size
	 * @return DatabaseField
	 */
	public function size(int|string $size)
	{
		$this->size = $size;
		return $this;
	}

	/**
	 * Make field nullable
	 * @return DatabaseField
	 */
	public function nullable()
	{
		$this->nullable = true;
		return $this;
	}

	/**
	 * Make field primary key
	 * @return DatabaseField
	 */
	public function primaryKey()
	{
		$this->primaryKey = true;
		return $this;
	}

	/**
	 * Make field unique
	 * @return DatabaseField
	 */
	public function unique()
	{
		$this->unique = true;
		return $this;
	}

	/**
	 * Set default value of field
	 * @param string $value
	 * @return DatabaseField
	 */
	public function default(string $value)
	{
		$this->default = $value;
		return $this;
	}

	/**
	 * Specify field as foreign key
	 * @param string $field
	 * @param string $table
	 * @return DatabaseField
	 */
	public function foreignKey(string $field, string $table)
	{
		$this->foreignKey = [$field, $table];
		return $this;
	}
}
