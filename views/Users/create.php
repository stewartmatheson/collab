<?php 

$context->getComponentByName("UsersService")->save(
    $_POST['email'], 
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['password'],
    $_POST['passwordConfirm']
); 

header("Location: http://localhost:8000/?q=/login");
http_response_code(303);
