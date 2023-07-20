<?php

use app\core\db\DatabaseField;
use app\core\Migration;

/**
 * Migrations are database changes. The order migrations are executed is every important. We start with a letter because the class must start with a letter
 */
class m_1689862827_create_bookings_table extends Migration
{
	public function up()
	{
		$this->db->create('bookings', [
			$this->db->field()->name('id')->type(DatabaseField::INT)->primaryKey(),
			$this->db->field()->name('user_id')->type(DatabaseField::INT)->foreignKey('id', 'users'),
			$this->db->field()->name('table_id')->type(DatabaseField::INT)->foreignKey('id', 'tables'),
			$this->db->field()->name('no_of_guests')->type(DatabaseField::TINYINT),
			$this->db->field()->name('booking_time')->type(DatabaseField::TIMESTAMP),
		]);
	}

	public function down()
	{
		$this->db->drop('bookings');
	}
}
