<?php

namespace app\core;

use app\core\Migration;
use app\core\SeederDataArray;

abstract class Seeder extends Migration
{
	private array $data = [];

	abstract protected function table(): string;

	protected function data()
	{
		return new SeederDataArray;
	}

	protected function add()
	{
		/**
		 * @var \app\core\SeederDataArray $data
		 */
		foreach (func_get_args() as $data) {
			$this->data[] = $data;
		}
	}

	public function seed()
	{
		/**
		 * @var \app\core\SeederDataArray $SeederData
		 */
		foreach ($this->data as $SeederData) {
			$this->db->insert($this->table(), $SeederData->map());
		}
	}

	public function down()
	{
		$this->db->drop($this->table());
	}
}
