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

   function get_user($email) {
      global $conn;
      $sql = "SELECT * FROM Users";
      $result = $conn -> query($sql);
      $users = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($users as $user) {
         if ($user['email'] == $email) {
            return $user;
         }
      }
      return null;
   }

   function create_user() {
      global $conn;
      $name = $conn->real_escape_string($_POST['name']);
      $email = $conn->mysqli_real_escape_string($_POST['email']);
      $password = $conn->mysqli_real_escape_string($_POST['password']);
      
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
      global $conn;
      $email_check = $conn->real_escape_string($_POST['email']);
      $password_check = $conn->real_escape_string($_POST['password']);
      $user = get_user($email_check);
      if ($user) {
         if($user['password'] == $password_check) {
            echo "User logged in successfully";
            echo "<a href='./'>Go home</a>";
            //header('Location: ./');
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;
         }
         else {
            echo "Error: incorrect password";
            echo "<a href='./signin.php'>Go back</a>";
         }
      } else {
         echo "Error: incorrect username";
         echo "<a href='./signin.php'>Go back</a>";
      }
      
   }

   function logout_user() {
      session_destroy();
      echo "user logged out successfully";
      echo "<a href='./'>Go home</a>";
      //header('Location: ./');
   }

   function create_post() {
      global $conn;
      $title = $conn->real_escape_string($_POST['title']);
      $content = $conn->real_escape_string($_POST['content']);
      $email = $_SESSION['email'];
      $sql = "INSERT INTO posts (email, title, content) VALUES ('$email', '$title', '$content')";
      $result = $conn->query($sql);
      if ($result) {
         echo "Post created successfully";
         echo "<a href='./'>Go home</a>";
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo "test";
   }

   function get_posts($email) {
      global $conn;
      $sql = "SELECT * FROM posts WHERE email = '$email'";
      $result = $conn->query($sql);
      $posts = $result->fetch_all(MYSQLI_ASSOC);
      return $posts;
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
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_post']))
   {
      create_post();
   }

   //$result->free_result();

   //$conn->close();
 ?>