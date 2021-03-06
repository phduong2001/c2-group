<div id="list-post">
    <?php foreach ($post_data as $post): ?>
    <div class="single-post" id="post-<?php echo $post->post_id; ?>">
        <div class="owner">
            <a href="<?php echo URLROOT . '/member/watch/' . $post->creator; ?>">
                <img src="<?php echo URLROOT . '/data/img/' . $post->avatar; ?>" alt="Avatar">
            </a>
            <div class="further-info">
                <p class="name"><?php echo $post->name; ?></p>
                <p class="time"><?php echo $post->created_at; ?></p>
            </div>
        </div>
        <div class="main-post">
            <p><?php echo $post->content; ?></p>
            <?php if (isset($post->file)): ?>
                <p><a href="<?php echo URLROOT . '/data/post/' . $post->file; ?>"><?php echo $post->old_name; ?></a></p>
            <?php endif; ?>
        </div>
        <hr>

        <div class="list-comment">
            <?php foreach ($post->comments as $comment): ?>
            <div class="single-comment">
                <a href="<?php echo URLROOT . '/member/watch/' . $comment->creator; ?>">
                    <img src="<?php echo URLROOT . '/data/img/' . $comment->avatar; ?>" alt="Avatar">
                </a>
                <div class="cmt-body">
                    <div class="cmt-header">
                        <p class="cmt-name"><?php echo $comment->name; ?></p>
                        <p class="cmt-time"><?php echo $comment->created_at; ?></p>
                    </div>
                    <p class="cmt-content"><?php echo $comment->content; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <hr id="hr-list-comment">
        <div class="my-comment">
            <img src="<?php echo URLROOT . '/data/img/' . $_SESSION['avatar']; ?>" alt="Avatar">
            <form class="make-comment" method="POST" id="comment-<?php echo $post->post_id; ?>">
                <input type="text" name="comment" placeholder="Để lại bình luận...">
                <button type="button" id="btn-make-comment">
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</div>