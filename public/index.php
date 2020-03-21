<?php

require '../vendor/autoload.php';

use Collab\Core\Context;

$context = new Context();
$router = $context->getComponentByName("Router");

$router->route("/", "Home/index");
$router->route("/about", "About/index");

// TODO : this should be private moving forward. We most likely will need 
// a more generic abstraction but at this point I'm not sure what it is
$currentPath = $_GET['q'] ? $_GET['q'] : "";
$route = $router->execute($currentPath);

$viewsFolder = __DIR__ . "/../src/Application/Views/";
require $viewsFolder . $route->getViewName() . ".php";

