<?php include 'header.php'; ?>

    <div class="container w-25">
        <h2>Sign In</h2>
        <form action="/blog/api.php" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mt-3" id="signIn" name="signin">Sign In</button>
        </form>
      </div>

      <?php include 'footer.php'; ?>
      
</body>
</html>