<?php

require '../vendor/autoload.php';

use Collab\Core\Context;
use Collab\Core\Request;

$context = new Context();
$router = $context->getComponentByName("Router");

$router->route("/", "Home/index", true);
$router->route("/about", "About/index", false);
$router->route("/posts", "Posts/create", true);

$router->route("/register", "Users/new", false);
$router->route("/users/create", "Users/create", false);

$router->route("/login", "Sessions/new", false);
$router->route("/sessions/create", "Sessions/create", false);


// TODO : this should be private moving forward. We most likely will need 
// a more generic abstraction but at this point I'm not sure what it is
$currentPath = $_GET['q'] ? $_GET['q'] : "";
$currentToken = $_COOKIE['token'] ? $_COOKIE['token'] : "";

$request = new Request();
$request->setPath($currentPath);
$request->setToken($currentToken);

try {
    $route = $router->execute($request);
    $viewsFolder = __DIR__ . "/../views/";
    require $viewsFolder . $route->getViewName() . ".php";
} catch (\Collab\Core\SecurityException $e) {
    header("HTTP/1.0 401 Unauthorized");
} catch (\Collab\Core\RouteNotFound $e) {
    header("HTTP/1.0 404 Not Found");
} 

