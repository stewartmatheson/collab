<?php

namespace Collab;

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
