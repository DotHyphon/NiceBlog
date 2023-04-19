    <?php include 'header.php'; ?>

    
    <div class="container">
        <div class="row">

        <?php if(isset($_SESSION['logged_in']) && !isset($_GET['user_id'])): ?>

            <div class="col-md-8">
                <h1 class="display-4">Create a post</h1>
                <form class="mb-5" action="/blog/api.php" method="POST">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                    </div>
                    <div class="form-group mb-2">
                      <label for="content">Content</label>
                      <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_post">Submit</button>
                </form>

                <!-- display users own recent posts -->
                <?php foreach(get_posts($_SESSION['user_id']) as $post): ?>
                    <div class="card mb-5">
                        <div class="card-header"><?php echo $post['title']; ?></div>
                        <div class="card-body"><?php echo $post['content']; ?></div>
                        <div class="card-footer">Posted by <?php echo get_user_by_id($post['user_id'])['name']; ?> @ <?php echo $post['created_at']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
  
            <!-- current users side column -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
                    <div class="card-header"><?php echo get_user_by_id($_SESSION['user_id'])['name']; ?> </div>
                    <div class="card-body">email: <?php echo get_user_by_id($_SESSION['user_id'])['email']; ?></div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <?php elseif (isset($_GET['user_id'])): ?>
                <!-- display user_id's recent posts -->
                <div class="col-md-8">
                    <?php foreach(get_posts($_GET['user_id']) as $post): ?>
                        <div class="card mb-5">
                            <div class="card-header"><?php echo $post['title']; ?></div>
                            <div class="card-body"><?php echo $post['content']; ?></div>
                            <div class="card-footer">Posted by <a href="./?user_id=<?php echo $post['user_id']; ?>"><?php echo get_user_by_id($post['user_id'])['name']; ?></a> @ <?php echo $post['created_at']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- display user_ids side column -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
                        <div class="card-header"><?php echo get_user_by_id($_GET['user_id'])['name']; ?> </div>
                        <div class="card-body">email: <?php echo get_user_by_id($_GET['user_id'])['email']; ?></div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            <?php else: ?>
                <!-- display random blog posts/accoutns -->
                <?php foreach(get_posts() as $post): ?>
                    <div class="card mb-5">
                        <div class="card-header"><?php echo $post['title']; ?></div>
                        <div class="card-body"><?php echo $post['content']; ?></div>
                        <div class="card-footer">Posted by <a href="./?user_id=<?php echo $post['user_id']; ?>"><?php echo get_user_by_id($post['user_id'])['name']; ?></a> @ <?php echo $post['created_at']; ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    

    <?php include 'footer.php'; ?>

    <script src="main.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>