<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1688654646_create_containers_table extends Migration
{
	public function up()
	{
		$this->db->create('containers', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('name')->type(DatabaseField::VARCHAR)->size(50),
			$this->db->field()->name('description')->type(DatabaseField::TEXT),
			$this->db->field()->name('image')->type(DatabaseField::VARCHAR)->size(512),
			$this->db->field()->name('price')->type(DatabaseField::DECIMAL)->size('10,2')
		]);
	}

	public function down()
	{
		// drop users
		$this->db->drop('containers');
	}
}
