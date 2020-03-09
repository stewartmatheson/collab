<?php

require '../vendor/autoload.php';

use Collab\Context;

$context = new Context();
$context->start($_GET['q'] ? $_GET['q'] : "");

