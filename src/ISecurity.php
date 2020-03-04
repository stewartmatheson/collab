<?php

namespace Collab;

interface ISecurity {
    function validate();
    function getContext() : SecurityContext;
}
