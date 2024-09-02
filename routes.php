<?php
use Controllers\GenresController;
use Core\Router;

// dd(IndexController::class);
$router = new Router();

$router->get('genres', [GenresController::class, 'index']);
return [
    '/'                     => 'controllers/home/index.php',
    
    '/dashboard'              => 'controllers/dashboard/index.php',
   
    '/rentals'              => 'controllers/rentals/index.php',
    '/rentals/show'         => 'controllers/rentals/show.php',
    '/rentals/create'       => 'controllers/rentals/create.php',
    '/rentals/store'        => 'controllers/rentals/store.php',
    '/rentals/edit'         => 'controllers/rentals/edit.php',
    '/rentals/update'       => 'controllers/rentals/update.php',
    '/rentals/destroy'      => 'controllers/rentals/destroy.php',
    
    '/members'              => 'controllers/members/index.php',
    '/members/show'         => 'controllers/members/show.php',
    '/members/create'       => 'controllers/members/create.php',
    '/members/store'        => 'controllers/members/store.php',
    '/members/edit'         => 'controllers/members/edit.php',
    '/members/update'       => 'controllers/members/update.php',
    '/members/destroy'      => 'controllers/members/destroy.php',

    '/genres'               => [GenresController::class, 'index'],
    '/genres/show'          => [GenresController::class, 'show'],
    '/genres/create'        => [GenresController::class, 'store'],
    '/genres/store'         => [GenresController::class, 'store'],
    '/genres/edit'          => [GenresController::class, 'edit'],
    '/genres/update'        => [GenresController::class, 'update'],
    '/genres/destroy'       => [GenresController::class, 'destroy'],

    '/movies'               => 'controllers/movies/index.php',
    '/movies/show'          => 'controllers/movies/show.php',
    '/movies/create'        => 'controllers/movies/create.php',
    '/movies/store'         => 'controllers/movies/store.php',
    '/movies/edit'          => 'controllers/movies/edit.php',
    '/movies/update'        => 'controllers/movies/update.php',
    '/movies/destroy'       => 'controllers/movies/destroy.php',
    
    '/prices'            => 'controllers/prices/index.php',
    '/prices/show'       => 'controllers/prices/show.php',
    '/prices/create'     => 'controllers/prices/create.php',
    '/prices/store'      => 'controllers/prices/store.php',
    '/prices/edit'       => 'controllers/prices/edit.php',
    '/prices/update'     => 'controllers/prices/update.php',
    '/prices/destroy'    => 'controllers/prices/destroy.php',

    '/formats'                => 'controllers/formats/index.php',
    '/formats/show'           => 'controllers/formats/show.php',
    '/formats/create'         => 'controllers/formats/create.php',
    '/formats/store'          => 'controllers/formats/store.php',
    '/formats/edit'           => 'controllers/formats/edit.php',
    '/formats/update'         => 'controllers/formats/update.php',
    '/formats/destroy'        => 'controllers/formats/destroy.php',
    
];