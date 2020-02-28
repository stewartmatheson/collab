<?php
require('./vendor/smarty/smarty/libs/Smarty.class.php');

interface TemplateManager {
    public function render(string $templateName);
}

class SmartyTemplateManager extends Smarty implements TemplateManager {

    function __construct()
    {
        parent::__construct();
        $this->setTemplateDir(__DIR__ . '/templates/');
        $this->setCompileDir(__DIR__ . '/tmp/templates_c/');
        $this->setConfigDir(__DIR__ . '/config/');
        $this->setCacheDir(__DIR__ . '/tmp/cache/');
        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Collab');
    }

    public function render(string $templateName) {
        $this->display($templateName . ".html");
    }
    
}



class BasicTemplateManager implements TemplateManager {
    public function render(string $templateName) {
        echo "Hello from the basic template manager " . $templateName;
    }
}

class Controller {

    private TemplateManager $templateManager;

    function __construct(TemplateManager $templateManager) {
        $this->templateManager = $templateManager;
    }

    public function index() {
        $this->templateManager->render("index");
    }

    public function about() {
        $this->templateManager->render("about");
    }

    public function notFound() {
        $this->templateManager->render("404");
    }
}

class Application {

    private Controller $controller;

    function __construct (Controller $controller) {
        $this->controller = $controller;
    }

    public function run (string $path) {
        if($path == "/") {
            $this->controller->index();
        } else if($path == "/about") {
            $this->controller->about();
        } else {
            $this->controller->notFound();
        }
    }
}

?>

<h1>Welcome to Collab</h1>

<p>
    <a href="/?q=/">Home</a>
    <a href="/?q=/about">About</a>
    <a href="/?q=/somewhereelse">NotFound</a>
</p>

<?
// $templateManager = new BasicTemplateManager();
$templateManager = new SmartyTemplateManager();
$controller = new Controller($templateManager);
$app = new Application($controller);
$app->run($_GET['q'] ? $_GET['q'] : "");
?>
