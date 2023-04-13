<?php
   define('HOST', 'localhost');
   define('USER', 'u362280410_will');
   define('PASS', 'Fx(GDR+nZd+(@9$');
   define('NAME', 'u362280410_users');

   $conn = new mysqli(HOST, USER, PASS, NAME);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   echo 'connected';

   $sql = "SELECT * FROM Users";
   $result = mysqli_query($conn, $sql);
   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

   var_dump($users);

   //  if ($_SERVER['REQUEST_METHOD'] === 'POST')
   //  {
   //      //Ok we got a POST, probably from a FORM, read from $_POST.
   //      var_dump($_POST['title']); //Use this to see what info we got!
   //  }
   //  else
   //  {
   //     //You could assume you got a GET
   //     var_dump($_GET); //Use this to see what info we got!
   //  }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <a href="./">Home</a>
 </body>
 </html>