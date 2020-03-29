<?php

namespace Collab\Application; 

class PostServicePersistenceException extends \RuntimeException {
    function __construct($message) {
        parent::__construct($message);
    }
}
