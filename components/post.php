<div class="card mb-5">
    <div class="card-header fw-bold"><?php echo $p_post['title']; ?></div>
    <div class="card-body"><?php echo $p_post['content']; ?></div>
    <div class="card-footer">Posted by <? echo get_user_by_id($p_post['user_id'])['name']; ?> @ <? echo $p_post['created_at']; ?></div>
    <a class="card-link" href="./?user_id=<? echo $p_post['user_id']; ?>">View profile</a>
</div>

