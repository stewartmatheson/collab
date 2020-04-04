<?php

namespace Collab\Core;

class Request {

    private string $path;
    private string $token;

    public function getPath(): string {
        return $this->path;
    }
    
    public function setPath(string $path) {
        $this->path = $path;
    }

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token) {
        $this->token = $token;
    }

}
