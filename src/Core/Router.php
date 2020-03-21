<?php

namespace Collab\Core;

use Collab\Core\Route;

class RouteNotFound extends \Exception {}

class Router {
    private array $routes = [];

    public function route(string $path, string $viewName) {
        array_push($this->routes, new Route($path, $viewName));
    }

    public function execute(string $path): ?Route {
        foreach($this->routes as $route) {
            $routeMatchResult = $route->match($path);
            if ($routeMatchResult->getIsMatch()) {
                return $route;                
            } 
        }
        throw new RouteNotFound();
    }
}

