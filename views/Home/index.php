<?php $postsCursor = $context->getComponentByName("PostsService")->all(); ?>
<?php $securityContext = $context->getComponentByName("Security")->getContext(); ?>
<?php require __DIR__ . '/../header.php' ?>

<div id="announce">
    👋 Looks like your new here. Why not take the time and say Hi?
</div>

<div id="posts">
    <?php while($post = $postsCursor->fetch()): ?> 
        <div class="post">
            <div class="post-details">
                <span class="post-user-details"><?= $post->userEmail ?></span>
                <span class="post-created-at">on <?= \Collab\Helpers\DateTime::format($post->createdAt, 'Australia/Melbourne') ?></span>
            </div>
            <div class="post-body">
                <?= $post->body ?>
            </div>
        </div>
    <?php endwhile; ?>

    <form action="/?q=/posts" method="POST">
        <textarea name="body" placeholder="type your message to the group"></textarea>
        <input name="email" type="hidden" value="<?= $securityContext->getEmail() ?>" />
        <input type="submit" value="Post" />
    </form>
</div>

<?php require __DIR__ . '/../footer.php' ?>
