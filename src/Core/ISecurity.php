<?php

namespace Collab\Core;

interface ISecurity {
    function validate();
    function getContext() : SecurityContext;
}
