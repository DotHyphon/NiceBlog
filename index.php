    <?php include 'header.php'; ?>

    <?php if(isset($_SESSION['logged_in'])): ?>
    <div class="container">
        <div class="row">
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

                <!-- display recent posts -->
                <?php foreach(get_posts($_SESSION['email']) as $post): ?>
                    <div class="card mb-5">
                        <div class="card-header"><?php echo $post['title']; ?></div>
                        <div class="card-body"><?php echo $post['content']; ?></div>
                        <div class="card-footer"><?php echo get_user($_SESSION['email'])['name']; ?> : <?php echo $post['time']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
  
            <!-- side column -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
                    <div class="card-header"><?php echo get_user($_SESSION['email'])['name']; ?> </div>
                    <div class="card-body"><?php email: echo $_SESSION['email']?></div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <!-- display random blog posts/accoutns -->
    <?php endif; ?>

    <?php include 'footer.php'; ?>

    <script src="main.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>