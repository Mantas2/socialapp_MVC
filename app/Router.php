<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $requestMethod, string $requestUri, array $controller)
    {
        $this->routes[$requestMethod][$requestUri] = $controller;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {   
        $action = $this->routes[$requestMethod][$requestUri];

        if (! $action) {
            throw new RouteNotFoundException();
        }

//        echo '<pre>';
//        var_dump($action);
//        echo '<pre>';
        return call_user_func($action);
    }
}