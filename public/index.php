<?php

require '../vendor/autoload.php';
use Collab\Framework\SmartyTemplateManager;
use Collab\Controller;
use Collab\Application;

$templateManager = new SmartyTemplateManager();
$controller = new Controller($templateManager);
$app = new Application($controller);
$app->run($_GET['q'] ? $_GET['q'] : "");

