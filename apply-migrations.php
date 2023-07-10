<?php
// load autoload

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

// you must create an instance of Application here
$App = new Application(__DIR__);
if (!$App->DB->applyMigrations())
	die("Failed to apply migrations");
die("Migrations applied successfully");
