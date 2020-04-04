<?php

namespace Collab\Core;

use Collab\Core\Route;
use Collab\Core\Request;
use Collab\Core\ISecurity;

class RouteNotFound extends \Exception {}
class SecurityException extends \Exception {}

class Router {
    private array $routes = [];
    private ISecurity $security;

    function __construct (ISecurity $security) {
        $this->security = $security;
    }

    public function route(string $path, string $viewName, bool $isSecure) {
        array_push($this->routes, new Route($path, $viewName, $isSecure));
    }

    public function execute(Request $request): ?Route {

        foreach($this->routes as $route) {
            $routeMatchResult = $route->match($request->getPath());
            if ($routeMatchResult->getIsMatch()) {
                $this->testSecurity($route, $request);
                return $route;                
            } 
        }
        throw new RouteNotFound();
    }

    private function testSecurity(Route $route, Request $request) {
        if ($route->getIsSecure()) {
            if (!$this->security->validate($request)) {
                throw new SecurityException();
            }
        }
    }
}

