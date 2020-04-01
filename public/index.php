<?php

require '../vendor/autoload.php';

use Collab\Core\Context;

$context = new Context();
$router = $context->getComponentByName("Router");

$router->route("/", "Home/index");
$router->route("/about", "About/index");
$router->route("/posts", "Posts/create");

$router->route("/register", "Users/new");
$router->route("/users/create", "Users/create");

// TODO : this should be private moving forward. We most likely will need 
// a more generic abstraction but at this point I'm not sure what it is
$currentPath = $_GET['q'] ? $_GET['q'] : "";

try {
    $route = $router->execute($currentPath);
    $viewsFolder = __DIR__ . "/../views/";
    require $viewsFolder . $route->getViewName() . ".php";
} catch (\Collab\Core\SecurityException $e) {
    header("HTTP/1.0 401 Unauthorized");
} catch (\Collab\Core\RouteNotFound $e) {
    header("HTTP/1.0 404 Not Found");
} 

