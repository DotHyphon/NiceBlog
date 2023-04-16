<?php
   define('HOST', 'localhost');
   define('USER', 'u362280410_will');
   define('PASS', 'Fx(GDR+nZd+(@9$');
   define('NAME', 'u362280410_users');

   session_start();

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
         echo "<a href='./'>Go home</a>";
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }

   function login_user() {
      $email_check = $_POST['email'];
      $password_check = $_POST['password'];
      $user = get_user($email_check);
      if ($user) {
         if($user['password'] == $password_check) {
            echo "User logged in successfully";
            //header('Location: ./');
            $_SESSION['user'] = $user['email'];
            $_SESSION['logged_in'] = true;
         }
         else {
            echo "Error: incorrect password";
         }
      } else {
         echo "Error: incorrect username";
      }
      echo "<a href='./'>Go home</a>";
   }

   function logout_user() {
      session_destroy();
      echo "user logged out successfully";
      echo "<a href='./'>Go home</a>";
      //header('Location: ./');
   }

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create']))
   {
      create_user();
   }
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin']))
   {
      login_user();
   }
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout']))
   {
      logout_user();
   }

   $result->free_result();

   $conn->close();
 ?>