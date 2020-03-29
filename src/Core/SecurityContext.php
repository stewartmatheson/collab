<?php 

namespace Collab\Core;

class SecurityContext {

    private string $displayName;
    private string $email;

    function __construct(string $email, string $displayName) {
        $this->email = $email;
        $this->displayName = $displayName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDisplayName() {
        return $this->displayName;
    }
}

