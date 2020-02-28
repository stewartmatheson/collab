<h1>Welcome to Collab</h1>
<p>
    <a href="/?q=/">Home</a>
    <a href="/?q=/about">About</a>
    <a href="/?q=/somewhereelse">NotFound</a>
</p>

<?php

require '../vendor/smarty/smarty/libs/Smarty.class.php';
require '../src/Framework/ITemplateManager.php';
require '../src/Framework/SmartyTemplateManager.php';
require '../src/Application.php';
require '../src/Controller.php';

$templateManager = new SmartyTemplateManager();
$controller = new Controller($templateManager);
$app = new Application($controller);
$app->run($_GET['q'] ? $_GET['q'] : "");

