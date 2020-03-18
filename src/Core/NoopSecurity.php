<?php 

namespace Collab\Core;

use Collab\Core\ISecurity;

class NoopSecurity implements ISecurity {
    public function validate() {
        return true;
    }

    public function getContext() : SecurityContext {
        return new SecurityContext();
    }
}
