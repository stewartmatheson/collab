<?php 

namespace Collab\Core;

use Collab\Core\ISecurity;

class NoopSecurity implements ISecurity {

    public function validate() : bool {
        return true;
    }

    public function getContext() : SecurityContext {
        $email = "someone140758@somewhere.com";
        $displayName = "Stewart M";
        return new SecurityContext($email, $displayName);
    }
}

