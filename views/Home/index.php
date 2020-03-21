<?php $postsCursor = $context->getComponentByName("PostsService")->all(); ?>
<?php require __DIR__ . '/../header.php' ?>

<div id="announce">
    👋 Looks like your new here. Why not take the time and say Hi?
</div>

<div id="posts">
    <?php while($post = $postsCursor->fetch()): ?> 
        <div class="post">
            <?= $post->body ?>
        </div>
    <?php endwhile; ?>

    <form action="/posts" method="POST">
        <textarea placeholder="type your message to the group"></textarea>
    </form>
</div>

<?php require __DIR__ . '/../footer.php' ?>
