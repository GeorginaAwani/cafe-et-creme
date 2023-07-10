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
}
