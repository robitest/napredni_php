<?php

// CRUD => C = create; R = read; U = update; D = delete

session_start();

require_once '../Core/functions.php';
require_once base_path('Core/bootstrap.php');
// require_once base_path('Core/router.php');

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$routes = require base_path('routes.php');


// $ec = new ElCar(95, 'NMC', 'CCS', 'Tesla', 'Model S', 'electric', 2300, 'cestovno', 'B');
// $car = new Car('Tesla', 'Model S', 'electric', 2300, 'cestovno', 'B');
// dd($car instanceof Driveable);