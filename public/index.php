<?php

require '../vendor/autoload.php';

use Collab\Controller;
use Collab\Application;
use Collab\SmartyTemplateManager;
use Collab\NoopSecurity;

$templateManager = new SmartyTemplateManager();
$controller = new Controller($templateManager);
$security = new NoopSecurity();
$app = new Application($controller, $security);
$response = $app->run($_GET['q'] ? $_GET['q'] : "");
$response->render();

