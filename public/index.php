<?php

/** We need to require our autoload file */

use app\controllers\AuthController;
use app\controllers\CategoryController;
use app\controllers\ContactController;
use app\controllers\ContainerController;
use app\controllers\DrinkController;
use app\controllers\MenuController;
use app\controllers\SiteController;
use app\controllers\ToppingController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$App = new Application(dirname(__DIR__), User::class);

$App->Router->get('/', [SiteController::class, 'home']);

// get home products
$App->Router->get('/api/home', [SiteController::class, 'index']);

$App->Router->get('/about', [SiteController::class, 'about']);

$App->Router->get('/contact', [ContactController::class, 'index']);
$App->Router->post('/api/contact', [ContactController::class, 'create']);


$App->Router->get('/menu', [MenuController::class, 'index']);
$App->Router->get('/menu/{category}', [MenuController::class, 'menu']);


// Get categories
$App->Router->get('/api/categories', [CategoryController::class, 'index']);

// Get toppings
$App->Router->get('/api/toppings', [ToppingController::class, 'index']);

// Get containers
$App->Router->get('/api/containers', [ContainerController::class, 'index']);

// Get drinks
$App->Router->get('/api/drinks/', [DrinkController::class, 'index']);
$App->Router->get('/api/drinks/{id}', [DrinkController::class, 'show']);


$App->Router->get('/login', [AuthController::class, 'login']);
$App->Router->post('/api/login', [AuthController::class, 'login']);

$App->Router->get('/signup', [AuthController::class, 'signup']);
$App->Router->post('/api/signup', [AuthController::class, 'signup']);

$App->run();
