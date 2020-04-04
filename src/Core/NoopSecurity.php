<?php 

namespace Collab\Core;

use Collab\Core\ISecurity;
use Collab\Core\Request;

class NoopSecurity implements ISecurity {

    public function validate(Request $request) : bool {
        return true;
    }

    public function getContext() : SecurityContext {
        $email = "someone140758@somewhere.com";
        $displayName = "Stewart M";
        return new SecurityContext($email, $displayName);
    }
}

