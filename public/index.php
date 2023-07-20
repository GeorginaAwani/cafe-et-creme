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


$App->Router->get('/menu', [MenuController::class, 'menu']);


// Get categories
$App->Router->get('/api/categories', [MenuController::class, 'categories']);

// Get toppings
$App->Router->get('/api/toppings', [MenuController::class, 'toppings']);
// $App->Router->get('/api/toppings/{id}', [MenuController::class, 'toppings']);

// Get containers
$App->Router->get('/api/containers', [MenuController::class, 'containers']);
// $App->Router->get('/api/containers/{id}', [MenuController::class, 'containers']);

// Get drinks
$App->Router->get('/api/drinks/{id}', [MenuController::class, 'drink']);
$App->Router->get('/api/drinks', [MenuController::class, 'drinks']);


$App->Router->get('/login', [AuthController::class, 'renderLogin']);
$App->Router->post('/api/login', [AuthController::class, 'handleLogin']);

$App->Router->get('/signup', [AuthController::class, 'renderSignup']);
$App->Router->post('/api/signup', [AuthController::class, 'handleSignup']);

$App->run();
