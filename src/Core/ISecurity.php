<?php

namespace Collab\Core;

use Collab\Core\SecurityContext;

interface ISecurity {
    function validate() : bool;
    function getContext() : SecurityContext;
}
