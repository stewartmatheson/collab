<?php 

$context->getComponentByName("PostsService")->save($_POST['body'], $_POST['email']); 
header("Location: http://localhost:8000/?q=/");
http_response_code(303);
