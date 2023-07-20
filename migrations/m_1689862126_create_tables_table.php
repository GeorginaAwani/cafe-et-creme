<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689862126_create_tables_table extends Migration
{
	public function up()
	{
		$this->db->create('tables', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('number')->type(DatabaseField::INT),
			$this->db->field()->name('capacity')->type(DatabaseField::INT),
			$this->db->field()->name('is_available')->type(DatabaseField::BOOLEAN),
			$this->db->field()->name('position')->type(DatabaseField::VARCHAR)->size(10)
		]);
	}

	public function down()
	{
		$this->db->drop('tables');
	}
}
