<?php
namespace Routes;
class Router
{
    private $routes = [];

    public function addRoute($method, $path, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
        ];
    }

    public function dispatch($method, $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchPath($route['path'], $uri)) {
                list($controllerClass, $controllerMethod) = explode('?', $route['controller']);
                $controller = new $controllerClass();
                $controller->$controllerMethod();
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }

    private function matchPath($routePath, $requestPath)
    {
        $routePath = rtrim($routePath, '/');
        $requestPath = rtrim($requestPath, '/');

        return preg_match("#^$routePath$#", $requestPath);
    }
}
