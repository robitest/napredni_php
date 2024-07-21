<?php

// CRUD => C = create; R = read; U = update; D = delete

use Vjezbe\ElectricCar as ElCar;
use Alex\Vjezbe\ElectricCar;
use Vjezbe\Car;
use Vjezbe\Driveable;

require_once '../functions.php';
require_once base_path('Core/bootstrap.php');
require_once base_path('Core/router.php');

// $ec = new ElCar(95, 'NMC', 'CCS', 'Tesla', 'Model S', 'electric', 2300, 'cestovno', 'B');
// $car = new Car('Tesla', 'Model S', 'electric', 2300, 'cestovno', 'B');
// dd($car instanceof Driveable);