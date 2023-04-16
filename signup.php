<?php include 'header.php'; ?>

    <div class="container w-25">
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
            <button type="submit" class="btn btn-primary mt-3" id="signUp" name="create">Sign Up</button>
        </form>
      </div>

      <footer>
        <p class="text-center"><a href="https://github.com/DotHyphon/NiceBlog">Source Code</a> by William Dean</p>
      </footer>
      
      <script src="main.js"></script>
</body>
</html>