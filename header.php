<?php
    session_start();
?>

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
                <button type="submit" class="btn btn-primary my-2" id="logout" name="logout">logout</button>
            </form>
        <?php else: ?>
            <a class="btn btn-primary mx-3 my-2" href="./signin.php">Login</a> 
            <a class="btn btn-primary mx-3 my-2" href="./signup.php">Sign Up</a> 
        <?php endif; ?>
        
    </div>
    <h1 class="display-1 text-center text-dark bg-light fw-bold p-5 mb-5">Nice Blog</h1>
