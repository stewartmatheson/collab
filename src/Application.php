<?php

namespace Collab;

interface IResponse {
    function render();
}

class UnauthorisedResponse implements IResponse {
    public function render() {
        header("HTTP/1.0 404 Not Found");    
        exit;
    }
}

class OKResponse implements IResponse {
    public function render() {
        exit;
    }
}

class Application {

    private Controller $controller;
    private ISecurity $security;

    function __construct (Controller $controller, ISecurity $security) {
        $this->controller = $controller;
        $this->security = $security;
    }

    public function run (string $path): IResponse {
        if (!$this->security->validate()) {
            return new UnauthorisedResponse();
        }
        
        if($path == "/") {
            $this->controller->index();
        } else if($path == "/about") {
            $this->controller->about();
        } else {
            $this->controller->notFound();
        }

        return new OKResponse();
    }
}

