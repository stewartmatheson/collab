<?php

namespace Collab\Core;

use Collab\Core\SecurityContext;
use Collab\Core\Request;

interface ISecurity {
    function validate(Request $request) : bool;
    function getContext() : SecurityContext;
}
