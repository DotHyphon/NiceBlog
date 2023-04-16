    <?php include 'header.php'; ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <form class="mb-5" action="/blog/api.php" method="POST">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                    </div>
                    <div class="form-group mb-2">
                      <label for="content">Content</label>
                      <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="card mb-5">
                    <div class="card-header">this is a title</div>
                    <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium iusto qui laborum. Deleniti, in perspiciatis omnis earum sapiente accusamus harum totam ipsum culpa vitae sunt eum molestias alias reiciendis obcaecati?</div>
                    <div class="card-footer">William Dean: 9/4/2023 3:35pm</div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">header</div>
                    <div class="card-body">body text</div>
                    <div class="card-footer">footer</div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">header</div>
                    <div class="card-body">body text</div>
                    <div class="card-footer">footer</div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">header</div>
                    <div class="card-body">body text</div>
                    <div class="card-footer">footer</div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">header</div>
                    <div class="card-body">body text</div>
                    <div class="card-footer">footer</div>
                </div>
                <div class="card mb-5">
                    <div class="card-header">header</div>
                    <div class="card-body">body text</div>
                    <div class="card-footer">footer</div>
                </div>

            </div>
  
            <!-- side column -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/test1.webp" alt="" class="card-img-top p-1 mx-auto w-50">
                    <div class="card-header">William Dean</div>
                    <div class="card-body">DOB: 1/3/1993</div>
                    <div class="card-footer">Melbourne, Vic</div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p class="text-center"><a href="https://github.com/DotHyphon/NiceBlog">Source Code</a> by William Dean</p>
      </footer>

    <script src="main.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>