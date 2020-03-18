<?php

namespace Collab\Core;

use Collab\Core\Application;
use Collab\Core\SmartyTemplateManager;
use Collab\Core\NoopSecurity;

use Collab\Application\PostsService;
use Collab\Application\UsersService;
use Collab\Application\Controller;
use \PDO;

class Context {

    private PostsService $postsService;
    private UsersService $usersService;

    private Application $application;

    function __construct () {
        $dsn = 'mysql:dbname=collab;host=127.0.0.1';
        $user = 'root';
        $password = 'secret';

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dbh = new PDO($dsn, $user, $password, $options);
        $this->postsService = new PostsService($dbh);
        $this->usersService = new UsersService($dbh);
        $templateManager = new SmartyTemplateManager();
        $controller = new Controller($templateManager, $this->postsService);
        $security = new NoopSecurity();
        $this->application = new Application($controller, $security);
    }

    public function start(string $incomingPath) {
        $response = $this->application->start($incomingPath);
        $response->render();
    }

    public function getPostsService() {
        return $this->postsService;
    }

    public function getUsersService() {
        return $this->usersService;
    }
}
