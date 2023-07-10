<?php

namespace app\core\db;

class Table
{
	private string $name;
	public bool $ifNotExists = false;

	private array $fields = [];

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	public function addField(DatabaseField $field)
	{
		$this->fields[] = $field;
	}

	/**
	 * Returns SQL to create a table
	 * @return string
	 */
	public function create()
	{
		try {
			$query = "CREATE TABLE ";
			if ($this->ifNotExists)
				$query .= "IF NOT EXISTS";
			$query .= " `{$this->name}`(";

			$primaryKey = null;
			$foreignKeys = [];
			$unique = [];

			$fields = [];

			// add a created_at field
			$DBF = new DatabaseField;
			$this->fields[] = $DBF->name('created_at')->type(DatabaseField::TIMESTAMP)->default('CURRENT_TIMESTAMP');

			/**
			 * @var DatabaseField $field
			 */
			foreach ($this->fields as $field) {
				$sql = [];
				$sql = ["`{$field->name}` {$field->type}"];

				if ($field->size) {
					$sql[] = "({$field->size})";
				}
				$sql[] = $field->nullable ? 'NULL' : 'NOT NULL';

				if ($field->unique) {
					$unique[] = $field->name;
				}

				if ($field->default)
					$sql[] = "DEFAULT {$field->default}";

				if ($field->primaryKey) {
					$primaryKey = $field->name;
					$sql[] = "AUTO_INCREMENT";
				}

				if ($field->foreignKey)
					$foreignKeys[$field->name] = $field->foreignKey;

				$fields[] = implode(' ', $sql);
			}

			$fields[] = "PRIMARY KEY (`{$primaryKey}`)";

			/**
			 * @var array $foreignKey [field, table]
			 */
			foreach ($foreignKeys as $name => $foreignKey) {
				$fields[] = "FOREIGN KEY (`{$name}`) REFERENCES {$foreignKey[1]}(`{$foreignKey[0]}`)";
			}

			foreach ($unique as $key) {
				$fields[] = "UNIQUE(`{$key}`)";
			}

			$query .= implode(', ', $fields);

			$query .= ") ENGINE = InnoDB";

			return $query;
		} catch (\Throwable $th) {
			throw $th;
		}
	}
}
