<?php

// CRUD => C = create; R = read; U = update; D = delete

use Core\Router;

session_start();

require_once '../Core/functions.php';
require_once base_path('Core/bootstrap.php');
// require_once base_path('Core/router.php');

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// dd($method);
$router = new Router();
$routes = require base_path('routes.php');
// dd($routes);
$router->route($uri, $method);

// $ec = new ElCar(95, 'NMC', 'CCS', 'Tesla', 'Model S', 'electric', 2300, 'cestovno', 'B');
// $car = new Car('Tesla', 'Model S', 'electric', 2300, 'cestovno', 'B');
// dd($car instanceof Driveable);