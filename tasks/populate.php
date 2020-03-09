<?php

require __DIR__ . '/../vendor/autoload.php';
use Collab\Context;
$context = new Context();

$randomNumber = rand(100000,999999);
$email = "someone{$randomNumber}@somewhere.com";
$context->getUsersService()->save($email, "Fred", "Smith");
$postsService = $context->getPostsService();

for($i = 0; $i < 10000; $i++) {
    $postId = $postsService->save("test", $email);
    echo "Post Generated with ID: " . $postId . "\n";
}

