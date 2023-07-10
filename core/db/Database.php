<?php

namespace app\core\db;

use app\core\Application;
use Dotenv\Dotenv;
use PDO;

class Database
{
	protected PDO $pdo;
	public const T_MIGRATIONS = 'migrations';

	function __construct()
	{
		// load values from the .env file to the superglobal
		$dotenv = Dotenv::createImmutable(Application::$ROOT);
		$dotenv->load();

		$dsn = $_ENV['DB_DSN'] ?? '';
		$user = $_ENV['DB_USER'] ?? '';
		$password = $_ENV['DB_PASSWORD'] ?? '';

		$this->pdo = new PDO($dsn, $user, $password);

		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function prepare(string $sql, array $params)
	{
		$statement = $this->pdo->prepare($sql);

		foreach ($params as $key => $value) {
			$statement->bindValue($key, $value);
		}

		if ($statement->execute()) return $statement;
	}

	public function exec(string $sql)
	{
		return $this->pdo->exec($sql);
	}

	/**
	 * Create a database table
	 * @param string $table
	 * @param array $fields
	 * @param bool $ignoreIfExists
	 * @return void
	 */
	public function create(string $table, array $fields, bool $ignoreIfExists = true)
	{
		$Table = new Table($table);
		$Table->ifNotExists = $ignoreIfExists;

		foreach ($fields as $field) {
			$Table->addField($field);
		}

		$this->exec($Table->create());
	}

	public function drop(string $table)
	{
		return $this->exec("DROP TABLE {$table}");
	}

	public function query(string $sql)
	{
		return $this->pdo->query($sql);
	}

	public function insert(string $table, array $params)
	{
		list($data, $columns) = $this->getQueryData($params);

		$columns = implode(', ', $columns);
		$placeholders = implode(', ', array_keys($data));

		$sql = "INSERT INTO `$table` ($columns) VALUES($placeholders)";

		return $this->prepare($sql, $data) ? $this->key() : false;
	}

	/**
	 * Delete record from database
	 * @param string $table
	 * @param string $where
	 * @param array $params
	 * @return \PDOStatement|bool
	 */
	public function delete(string $table, string $where, array $params)
	{
		return $this->prepare("DELETE FROM $table WHERE $where", $params);
	}

	public function key()
	{
		return $this->pdo->lastInsertId();
	}

	public function startTransaction()
	{
		return $this->pdo->beginTransaction();
	}

	public function inTransaction()
	{
		return $this->pdo->inTransaction();
	}

	public function commit()
	{
		return $this->pdo->commit();
	}

	public function rollback()
	{
		return $this->inTransaction() ? false : $this->rollback();
	}

	/**
	 * Returns an array containing a map of placeholder and value, column and all placeholders from a name-value record
	 * @param array $params
	 * @return array
	 */
	public function getQueryData(array $params): array
	{
		$columns = $set = [];

		foreach ($params as $key => $value) {
			$columns[] = $key;
			$set[":$key"] = $value;
		}

		return [$set, $columns];
	}

	/**
	 * Get migrations table
	 */
	private function create_migrations_table()
	{
		$this->create(self::T_MIGRATIONS, [
			$this->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->field()->name('migration')->type(DatabaseField::VARCHAR)->size(255)
		]);
	}

	/**
	 * Get migrations from local DB
	 */
	private function get_applied_migrations()
	{
		$query = $this->query("SELECT migration FROM " . self::T_MIGRATIONS);

		return $query->fetchAll(PDO::FETCH_COLUMN);
	}

	/**
	 * Get migrations from the folder
	 */
	private function get_migrations_from_folder(): array
	{
		return scandir(Application::$ROOT . '/migrations');
	}

	/**
	 * Save migrations to database
	 */
	private function save_migrations(array $migrations)
	{
		$this->startTransaction();

		foreach ($migrations as $migration) {
			$this->insert(self::T_MIGRATIONS, ['migration' => $migration]);
		}

		return $this->commit();
	}

	/**
	 * Replicate database changes in local system
	 */
	public function applyMigrations(): bool
	{
		try {
			$this->create_migrations_table();

			$newMigrations = [];
			$appliedMigrations = $this->get_applied_migrations();
			$files = $this->get_migrations_from_folder();

			$migrations = array_diff($files, $appliedMigrations);

			foreach ($migrations as $migration) {
				// skip all . and .. files
				if ($migration === '.' || $migration === '..') continue;

				// get file
				require_once Application::$ROOT . "/migrations/$migration";
				// the filename is equivalent ot the class name
				$Migration = pathinfo($migration, PATHINFO_FILENAME);

				$Migration = new $Migration;
				$Migration->up();
				$newMigrations[] = $migration;
			}

			// save new migrations
			if (!empty($newMigrations)) $this->save_migrations($newMigrations);

			return true;
		} catch (\Throwable $th) {
			echo $th->getMessage();
			return false;
		}
	}

	/**
	 * Undo database systems in local system
	 */
	public function revertMigrations(): bool
	{
		try {
			$this->startTransaction();

			$appliedMigrations = $this->get_applied_migrations();
			$files = $this->get_migrations_from_folder();

			// sort so latest migrations are deleted first
			rsort($files);

			foreach ($files as $migration) {
				// skip all . and .. files
				if ($migration === '.' || $migration === '..') continue;

				// get file
				require_once Application::$ROOT . "/migrations/$migration";

				// undo applied migrations
				if (in_array($migration, $appliedMigrations)) {
					// the filename is equivalent to the class name
					$Migration = pathinfo($migration, PATHINFO_FILENAME);
					$Migration = new $Migration;
					$Migration->down();
				}

				// $this->prepare("DELETE FROM " . self::T_MIGRATIONS . " WHERE migration = :migration", [':migration' => $migration]);

				// delete migration file
				unlink(Application::$ROOT . "/migrations/$migration");
			}

			$this->drop(self::T_MIGRATIONS);

			$this->commit();
			return true;
		} catch (\Throwable $th) {
			echo $th->getMessage();
			$this->rollback();
			return false;
		}
	}

	public function field()
	{
		return new DatabaseField;
	}
}
