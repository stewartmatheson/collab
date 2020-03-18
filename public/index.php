<?php

require '../vendor/autoload.php';

use Collab\Core\Context;

$context = new Context();
$context->start($_GET['q'] ? $_GET['q'] : "");

