<?php

namespace Collab\Core;

use Collab\Application\Controller;

interface IResponse {
    function render();
}

class UnauthorisedResponse implements IResponse {
    public function render() {
        header("HTTP/1.0 401 Unauthorized");
        exit;
    }
}

class OKResponse implements IResponse {
    public function render() {
        exit;
    }
}

class NotFoundResponse implements IResponse {
    public function render() {
        header("HTTP/1.0 404 Not Found");
        exit;
    }
}



class Application {
    private static array $routes = [];

    private Controller $controller;
    private ISecurity $security;

    function __construct (Controller $controller, ISecurity $security) {
        $this->controller = $controller;
        $this->security = $security;
    }

    public static function route (string $path, string $controllerLocation) {
        self::$routes.push(new Route($path));
    }

    public function start (string $path): IResponse {
        if (!$this->security->validate()) {
            return new UnauthorisedResponse();
        }

        $request = new Request($path);
        return $this->dispatch($request);
    }

    private function dispatch(Request $request): IResponse {
        $matchedRoute = $this->getMatchedRoute($request);
        if (isset($matchedRoute)) {
            return $matchedRoute->execute($request);
        }
        
        return new NotFoundResponse();
    }

    private function getMatchedRoute(Request $request): ?Route {
        foreach(self::$routes as $route) {
            if ($route->match($route, $request)) {
                return $route;                
            }
        }
        return null;
    }
}

