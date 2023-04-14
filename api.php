<?php
   define('HOST', 'localhost');
   define('USER', 'u362280410_will');
   define('PASS', 'Fx(GDR+nZd+(@9$');
   define('NAME', 'u362280410_users');

   $conn = new mysqli(HOST, USER, PASS, NAME);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT * FROM Users";
   $result = $conn -> query($sql);
   $users = $result->fetch_all(MYSQLI_ASSOC);



   function get_user($email) {
      global $users;
      foreach ($users as $user) {
         if ($user['email'] == $email) {
            return $user;
         }
      }
      return null;
   }

   function create_user() {
      global $conn;
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "INSERT INTO Users (name, email, password) VALUES ('$name', '$email', '$password')";
      $result = $conn->query($sql);
      if ($result) {
         echo "User created successfully";
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }

   if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      create_user();
   }

   $result->free_result();

   $conn->close();
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