<?php

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

// you must create an instance of Application here
$App = new Application(__DIR__);
if (!$App->DB->revertMigrations())
	die("Failed to revert migrations");
die("Migrations reverted successfully");
