<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Sign Up</title>
</head>
<body>
    <h1 class="display-1 text-center text-dark bg-light fw-bold p-5 mb-5">Nice Blog</h1>

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
            <button type="submit" class="btn btn-primary" id="signUp">Sign Up</button>
        </form>
      </div>

      <footer>
        <p class="text-center"><a href="https://github.com/DotHyphon/NiceBlog">Source Code</a> by William Dean</p>
      </footer>
      
      <script src="main.js"></script>
</body>
</html>