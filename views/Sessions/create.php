<?php 

$token = $context->getComponentByName("SessionsService")->save(
    $_POST['email'], 
    $_POST['password'],
); 
setcookie("token", $token);
header("Location: http://localhost:8000/?q=/");
http_response_code(303);

