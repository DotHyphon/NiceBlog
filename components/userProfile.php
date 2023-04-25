<div class="card">
    <img src="./images/pfp/<? echo $p_user_id ?>" onerror="this.src='./images/pfp/default.webp'" alt="" class="card-img-top p-1 mx-auto">
    <div class="card-header fw-bold"><? echo get_user_by_id($p_user_id)['name']; ?> </div>
    <div class="card-body">email: <? echo get_user_by_id($p_user_id)['email']; ?></div>
    <div class="card-footer"></div>
    <!-- need this blank link or the grid order goes whack -->
    <a class="card-link" href="#"></a>
</div>

<!-- $p_user_id must be set above include call -->