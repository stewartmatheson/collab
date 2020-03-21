<?php

namespace Collab\Core;

use Collab\Core\Router;

use Collab\Application\PostsService;
use Collab\Application\UsersService;
use \PDO;

class Context {

    private array $registeredComponents;

    function __construct () {
        $dsn = 'mysql:dbname=collab;host=127.0.0.1';
        $user = 'root';
        $password = 'secret';
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $dbh = new PDO($dsn, $user, $password, $options);

        $postsService = new PostsService($dbh);
        $this->registerComponent("PostsService", $postsService);

        $usersService = new UsersService($dbh);
        $this->registerComponent("UsersService", $usersService);

        $router = new Router();
        $this->registerComponent("Router", $router);
    }

    public function getComponentByName(string $name) {
        if (!isset($this->registeredComponents[$name])) {
            throw new Exception("Component not found " . $name);
        } else {
            return $this->registeredComponents[$name];
        }
    }

    private function registerComponent(string $name, $component) {
        $this->registeredComponents[$name] = $component;
    }
}
