<?php

namespace Collab; 

class PostServicePersistenceException extends \RuntimeException {
    function __construct($message) {
        parent::__construct($message);
    }
}
