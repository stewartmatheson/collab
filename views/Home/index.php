<?php $postsCursor = $context->getComponentByName("PostsService")->all(); ?>
<?php require __DIR__ . '/../header.php' ?>

<?php

function dateTimeFormatter (string $rawDbTime) {
    $date = new DateTime($rawDbTime);
    $date->setTimezone(new DateTimeZone('Australia/Melbourne'));
    return $date->format('Y-m-d H:i:s');
}

?>

<div id="announce">
    👋 Looks like your new here. Why not take the time and say Hi?
</div>

<div id="posts">
    <?php while($post = $postsCursor->fetch()): ?> 
        <div class="post">
            <div class="post-details">
                <span class="post-user-details"><?= $post->userEmail ?></span> <span class="post-created-at"><?= dateTimeFormatter($post->createdAt) ?></span>
            </div>
            <div class="post-body">
                <?= $post->body ?>
            </div>
        </div>
    <?php endwhile; ?>

    <form action="/?q=/posts" method="POST">
        <textarea name="body" placeholder="type your message to the group"></textarea>
        <input name="email" type="hidden" value="someone140758@somewhere.com" />
        <input type="submit" value="Post" />
    </form>
</div>

<?php require __DIR__ . '/../footer.php' ?>
