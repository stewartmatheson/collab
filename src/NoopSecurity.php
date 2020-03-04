<?php 

namespace Collab;

use Collab\ISecurity;

class NoopSecurity implements ISecurity {
    public function validate() {
        return true;
    }

    public function getContext() : SecurityContext {
        return new SecurityContext();
    }
}
