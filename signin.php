<? include './components/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Sign In</h2>
                <form action="/blog/api.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" id="signIn" name="signin">Sign In</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

        
      <? include './components/footer.php'; ?>
      
