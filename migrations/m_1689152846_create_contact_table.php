<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689152846_create_contact_table extends Migration
{
	public function up()
	{
		$this->db->create('contact', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('name')->type(DatabaseField::VARCHAR)->size(50),
			$this->db->field()->name('phone')->type(DatabaseField::VARCHAR)->size(30),
			$this->db->field()->name('message')->type(DatabaseField::TEXT),
		]);
	}

	public function down()
	{
		$this->db->drop('contact');
	}
}
