<div class="card">
    <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
    <div class="card-header fw-bold"><? echo get_user_by_id($p_user_id)['name']; ?> </div>
    <div class="card-body">email: <? echo get_user_by_id($p_user_id)['email']; ?></div>
    <div class="card-footer"></div>
    <a class="card-link" href="#"></a>
</div>

<!-- $p_user_id must be set above include call -->