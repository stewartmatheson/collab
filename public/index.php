<?php

require '../vendor/autoload.php';

use Collab\Context;

$context = new Context();
$context->route($_GET['q'] ? $_GET['q'] : "");

