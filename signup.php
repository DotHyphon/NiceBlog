<?php include 'header.php'; ?>

    <div class="container-md">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h2>Sign Up</h2>
          <form action="/blog/api.php" method="POST">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
              <button type="submit" class="btn btn-primary mt-3" id="signUp" name="create_user">Sign Up</button>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>

      <?php include 'footer.php'; ?>
      
      <script src="main.js"></script>
</body>
</html>