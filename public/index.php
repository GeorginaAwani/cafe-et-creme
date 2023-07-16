<?php

/** We need to require our autoload file */

use app\controllers\AuthController;
use app\controllers\MenuController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$App = new Application(dirname(__DIR__), User::class);

$App->Router->get('/', [SiteController::class, 'home']);

$App->Router->get('/about', [SiteController::class, 'about']);

$App->Router->get('/contact', [SiteController::class, 'renderContact']);
$App->Router->post('/api/contact', [SiteController::class, 'handleContact']);

$App->Router->get('/menu', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/toppings', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/toppings/{id}', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/containers/{id}', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/containers', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/drinks/{id}', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/drinks', [MenuController::class, 'renderMenu']);
$App->Router->get('/menu/{category}', [MenuController::class, 'renderMenu']);

$App->Router->get('/api/menu/toppings', [MenuController::class, 'toppings']);
$App->Router->get('/api/menu/toppings/{id}', [MenuController::class, 'toppings']);

$App->Router->get('/api/menu/containers', [MenuController::class, 'containers']);
$App->Router->get('/api/menu/containers/{id}', [MenuController::class, 'containers']);

$App->Router->get('/api/menu/drinks/{id}', [MenuController::class, 'drink']);

$App->Router->get('/api/menu/{category}', [MenuController::class, 'handleMenu']);


$App->Router->get('/login', [AuthController::class, 'renderLogin']);
$App->Router->post('/api/login', [AuthController::class, 'handleLogin']);

$App->Router->get('/signup', [AuthController::class, 'renderSignup']);
$App->Router->post('/api/signup', [AuthController::class, 'handleSignup']);

$App->run();
