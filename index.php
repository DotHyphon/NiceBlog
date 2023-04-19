    <? include './components/header.php'; ?>

    
    <div class="container">
        <div class="row">

        <? if(isset($_SESSION['logged_in']) && !isset($_GET['user_id'])): ?>

            <div class="col-md-8">
                <? include './components/createPost.php'; ?>

                <!-- display users own recent posts -->
                <? 
                foreach(get_posts($_SESSION['user_id']) as $post) {
                    include './components/post.php';
                }
                ?>
            </div>
  
            <!-- current users side column -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
                    <div class="card-header fw-bold"><? echo get_user_by_id($_SESSION['user_id'])['name']; ?> </div>
                    <div class="card-body">email: <? echo get_user_by_id($_SESSION['user_id'])['email']; ?></div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <? elseif (isset($_GET['user_id'])): ?>
                <!-- display user_id's recent posts -->
                <div class="col-md-8">
                    <? 
                    foreach(get_posts($_GET['user_id']) as $post) {
                        include './components/post.php';
                    }
                ?>
                </div>

                <!-- display user_ids side column -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
                        <div class="card-header"><? echo get_user_by_id($_GET['user_id'])['name']; ?> </div>
                        <div class="card-body">email: <? echo get_user_by_id($_GET['user_id'])['email']; ?></div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            <? else: ?>
                <!-- display random blog posts/accoutns -->
                <? 
                    foreach(get_posts() as $post) {
                        include './components/post.php';
                    }
                ?>
            <? endif; ?>
        </div>
    </div>
    

    <? include './components/footer.php'; ?>

    <script src="main.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>