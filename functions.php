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


// // autoload classes
// spl_autoload_register(function ($class_name) {
//     $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);

//     $file = base_path($class_name) . '.php';

//     if (file_exists($file)) {
//         require_once $file;
//     }
// });

// function base_path($path = '/'): string
// {
//     return dirname(__DIR__) . DIRECTORY_SEPARATOR . $path;
// }