<?php

namespace Collab\Core;

use Collab\Core\Route;
use Collab\Core\ISecurity;

class RouteNotFound extends \Exception {}
class SecurityException extends \Exception {}

class Router {
    private array $routes = [];
    private ISecurity $security;

    function __construct (ISecurity $security) {
        $this->security = $security;
    }

    public function route(string $path, string $viewName) {
        array_push($this->routes, new Route($path, $viewName));
    }

    public function execute(string $path): ?Route {
        if (!$this->security->validate()) {
            throw new SecurityException();
        }

        foreach($this->routes as $route) {
            $routeMatchResult = $route->match($path);
            if ($routeMatchResult->getIsMatch()) {
                return $route;                
            } 
        }
        throw new RouteNotFound();
    }
}

