<?php

require '../vendor/autoload.php';

use Collab\Controller;
use Collab\Application;
use Collab\SmartyTemplateManager;

$templateManager = new SmartyTemplateManager();
$controller = new Controller($templateManager);
$app = new Application($controller);
$app->run($_GET['q'] ? $_GET['q'] : "");

