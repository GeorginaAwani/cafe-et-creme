<?php

namespace app\core;

abstract class Migration
{
	protected $db;

	function __construct()
	{
		$this->db = Application::$App->DB;
	}

	abstract public function up();

	abstract public function down();

	protected function insertData(): array
	{
		return [];
	}

	protected function insert(string $table)
	{
		$insert = $this->insertData();

		foreach ($insert as $record) {
			$this->db->insert($table, $record);
		}
	}
}
