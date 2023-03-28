<?php

declare(strict_types=1);

session_start();

use App\Router;
use App\DB;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;

require_once __DIR__ . '/../vendor/autoload.php';
define('VIEW_PATH', __DIR__ . '/../views/');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router->register('GET', '/', [new HomeController(), 'index']);

$router->register('GET', '/register', [new RegisterController(), 'registerView']);
$router->register('POST', '/register', [new RegisterController(), 'validation']);

$router->register('GET', '/login', [new LoginController(), 'loginView']);
$router->register('POST', '/login', [new LoginController(), 'login']);

$router->register('POST', '/logout', [new LogoutController(), 'logout']);

$router->register('POST', '/posts', [new HomeController(), 'posts']);
$router->register('POST', '/like', [new HomeController(), 'likes']);

$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);