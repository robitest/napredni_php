<?php

require_once '../functions.php';
require_once base_path('classes/Database.php');

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
// dd(setActivePage($_SERVER['REQUEST_URI']));

switch ($uri) {
    case '/':
        require base_path('controllers/home.php');
        break;
    case '/members':
        require base_path('controllers/members/index.php');
        break;
    case '/members/create':
        require base_path('controllers/members/create.php');
        break;
    case '/members/store':
        require base_path('controllers/members/store.php');
        break;
    case '/genres':
        require base_path('controllers/genres/index.php');
        break;
    case '/genres/create':
        require base_path('controllers/genres/create.php');
        break;
    case '/genres/store':
        require base_path('controllers/genres/store.php');
        break;
    case '/movies':
        require base_path('controllers/movies/index.php');
        break;
    case '/movies/create':
        require base_path('controllers/movies/create.php');
        break;
    case '/movies/store':
        require base_path('controllers/movies/store.php');
        break;
    default:
        abort();
}


?>