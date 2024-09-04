<?php
use Controllers\RegisterController;
use Controllers\LoginController;
use Controllers\HomeController;
use Controllers\DashboardController;
use Controllers\RentalsController;
use Controllers\MembersController;
use Controllers\GenresController;
use Controllers\MoviesController;
use Controllers\PricesController;
use Controllers\FormatsController;

//Signup(register)
$router->get('/register',           [RegisterController::class, 'create']);
$router->post('/register',          [RegisterController::class, 'store']);

//Login & Logout
$router->get('/login',              [LoginController::class, 'create']);
$router->post('/login',             [LoginController::class, 'store']);
$router->post('/logout',            [LoginController::class, 'logout']);

//homepage
$router->get('/',                   [HomeController::class, 'index']);

//Dashboard
$router->get('/dashboard',          [DashboardController::class, 'index']);
$router->get('/dashboard/show',     [DashboardController::class, 'show']);
$router->get('/dashboard/create',   [DashboardController::class, 'create']);
$router->post('/dashboard',         [DashboardController::class, 'store']);
$router->get('/dashboard/edit',     [DashboardController::class, 'edit']);
$router->patch('/dashboard',        [DashboardController::class, 'update']);
$router->delete('/dashboard',       [DashboardController::class, 'delete']);

//Rentals
$router->get('/rentals',            [RentalsController::class, 'index']);
$router->get('/rentals/show',       [RentalsController::class, 'show']);
$router->get('/rentals/create',     [RentalsController::class, 'create']);
$router->post('/rentals',           [RentalsController::class, 'store']);
$router->get('/rentals/edit',       [RentalsController::class, 'edit']);
$router->patch('/rentals',          [RentalsController::class, 'update']);
$router->delete('/rentals',         [RentalsController::class, 'delete']);

//Members
// $router->get('/members',            [MembersController::class, 'index']);
// $router->get('/members/show',       [MembersController::class, 'show']);
// $router->get('/members/create',     [MembersController::class, 'create']);
// $router->post('/members',           [MembersController::class, 'store']);
// $router->get('/members/edit',       [MembersController::class, 'edit']);
// $router->patch('/members',          [MembersController::class, 'update']);
// $router->delete('/members',         [MembersController::class, 'delete']);

//Genres
$router->get('/genres',             [GenresController::class, 'index']);
$router->get('/genres/show',        [GenresController::class, 'show']);
$router->get('/genres/create',      [GenresController::class, 'create']);
$router->post('/genres',            [GenresController::class, 'store']);
$router->get('/genres/edit',        [GenresController::class, 'edit']);
$router->patch('/genres',           [GenresController::class, 'update']);
$router->delete('/genres',          [GenresController::class, 'delete']);

//Movies
// $router->get('/movies',             [MoviesController::class, 'index']);
// $router->get('/movies/show',        [MoviesController::class, 'show']);
// $router->get('/movies/create',      [MoviesController::class, 'create']);
// $router->post('/movies',            [MoviesController::class, 'store']);
// $router->get('/movies/edit',        [MoviesController::class, 'edit']);
// $router->patch('/movies',           [MoviesController::class, 'update']);
// $router->delete('/movies',          [MoviesController::class, 'delete']);

//Prices
// $router->get('/prices',             [PricesController::class, 'index']);
// $router->get('/prices/show',        [PricesController::class, 'show']);
// $router->get('/prices/create',      [PricesController::class, 'create']);
// $router->post('/prices',            [PricesController::class, 'store']);
// $router->get('/prices/edit',        [PricesController::class, 'edit']);
// $router->patch('/prices',           [PricesController::class, 'update']);
// $router->delete('/prices',          [PricesController::class, 'delete']);

//Formats
$router->get('/formats',            [FormatsController::class, 'index']);
$router->get('/formats/show',       [FormatsController::class, 'show']);
$router->get('/formats/create',     [FormatsController::class, 'create']);
$router->post('/formats',           [FormatsController::class, 'store']);
$router->get('/formats/edit',       [FormatsController::class, 'edit']);
$router->patch('/formats',          [FormatsController::class, 'update']);
$router->delete('/formats',         [FormatsController::class, 'delete']);