<?php

function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

function base_path($path): string
{
    return __DIR__ . DIRECTORY_SEPARATOR . $path;
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/errors/404.php");
    die;
}

function redirect($path)
{
    header("Location:/$path");
    exit();
}

function setActivePage($cont, $url)
{   
    $contPath = explode('/', rtrim($url, '/'));
    if($cont === $contPath[1]){
        return 'active';
    }else{
        return '';
    }  
}

// // autoload classes
// spl_autoload_register(function ($class_name) {
//     $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);

//     $file = base_path($class_name) . '.php';

//     if (file_exists($file)) {
//         require_once $file;
//     }
// });
// }