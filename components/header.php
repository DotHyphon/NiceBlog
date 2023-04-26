<?php include 'api.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <title>Nice Blog</title>
</head>
<body>
    <div class="container"> 
        <?php if (isset($_SESSION['logged_in'])): ?>
            <form action="/blog/api.php" method="POST">
                <button type="submit" class="btn btn-primary mx-3 my-2" id="logout" name="logout">logout</button>
                <a class="btn btn-primary mx-3 my-2" href="./profile.php" id="profile" name="profile">Update Profile</a>
            </form>
            
        <?php else: ?>
            <a class="btn btn-primary mx-3 my-2" href="./signin.php">Login</a> 
            <a class="btn btn-primary mx-3 my-2" href="./signup.php">Sign Up</a> 
        <?php endif; ?>
        
    </div>
    <a href="./" style="text-decoration: none;"><h1 class="display-1 text-center text-dark bg-light fw-bold p-5 mb-5">Nice Blog</h1><a>
