<div class="card mb-5">
    <div class="card-header fw-bold"><?php echo $post['title']; ?></div>
    <div class="card-body"><?php echo $post['content']; ?></div>
    <div class="card-footer">Posted by <a href="./?user_id=<?php echo $post['user_id']; ?>"><?php echo get_user_by_id($post['user_id'])['name']; ?></a> @ <?php echo $post['created_at']; ?></div>
</div>