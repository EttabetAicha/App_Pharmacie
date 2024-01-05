<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\AdminController;

class Router
{
    private $routes = [];




    public function get($route, $controllerAction)
    {
        $this->routes['GET'][$route] = $controllerAction;
    }

    public function post($route, $controllerAction)
    {
        $this->routes['POST'][$route] = $controllerAction;
    }


    public function route($method, $uri)
    {

        $controllerAction = $this->routes[$method][$uri];

        if ($controllerAction) {
            [$controller, $action] = explode('@', $controllerAction);


            if (class_exists($controller) && method_exists($controller, $action)) {

                $controllerInstance = new $controller();
                $controllerInstance->$action();
            } else {

                echo "route : 404 Not Found";
            }
        } else {

            echo "404 Not Found";
        }
    }


    public function defaultRoute()
    {

        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }
}
