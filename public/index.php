<?php

/** We need to require our autoload file */

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$App = new Application(dirname(__DIR__), User::class);

$App->Router->get('/', [SiteController::class, 'home']);

$App->Router->get('/about', [SiteController::class, 'about']);

$App->Router->get('/contact', [SiteController::class, 'contact']);

$App->Router->get('/menu', [SiteController::class, 'menu']);

$App->Router->get('/login', [AuthController::class, 'login']);

$App->Router->get('/signup', [AuthController::class, 'signup']);

// $App->Router->get()

$App->run();
