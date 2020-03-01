<h1>Welcome to Collab</h1>
<p>
    <a href="/?q=/">Home</a>
    <a href="/?q=/about">About</a>
    <a href="/?q=/somewhereelse">NotFound</a>
</p>

<?php

require '../vendor/autoload.php';
use Collab\Framework\SmartyTemplateManager;
use Collab\Controller;
use Collab\Application;

$templateManager = new SmartyTemplateManager();
$controller = new Controller($templateManager);
$app = new Application($controller);
$app->run($_GET['q'] ? $_GET['q'] : "");

