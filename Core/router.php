<?php

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$routes = require base_path('routes.php');

function routeToController(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {

        $action = $routes[$uri];

        $controllerClassPath = $action[0];
        $controllerMethod = $action[1];

        $controllerObject = new $controllerClassPath();

        if(method_exists($controllerObject, $controllerMethod))
        {
            $controllerObject->$controllerMethod();
        }else{
            dd('Metoda ne postoji');
        }
        // require base_path($routes[$uri]);
    } else {
        abort();
    }
}

routeToController($uri, $routes);