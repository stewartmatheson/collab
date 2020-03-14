<?php

namespace Collab;

class Request {

    private string $path;

    function __construct (string $path) {
        $this->path = $path;
    }

    public function getPath(): string {
        return $this->path;
    }
}
