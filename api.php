<?
   require '../../credentials/blog/db.php';

   session_start();
   //credntials from db.php
   $conn = new mysqli(HOST, USER, PASS, NAME);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   function get_user_by_email($email) {
      global $conn;
      $sql = "SELECT * FROM users";
      $result = $conn -> query($sql);
      $users = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($users as $user) {
         if (strtolower($user['email']) == strtolower($email)) {
            return $user;
         }
      }
      return null;
   }

   function get_user_by_id($id) {
      global $conn;
      $sql = "SELECT * FROM users";
      $result = $conn -> query($sql);
      $users = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($users as $user) {
         if ($user['id'] == $id) {
            return $user;
         }
      }
      return null;
   }

   function create_user() {
      global $conn;
      $name = $conn->real_escape_string($_POST['name']);
      $email = $conn->real_escape_string($_POST['email']);
      $password = $_POST['password'];

      $salt = random_bytes(16);
      $salted = $password . $salt;
      $hashed = hash('sha256', $salted);
      $password = $hashed . ':' . base64_encode($salt);
      
      $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
      $result = $conn->query($sql);
      if ($result) {
         // echo "User created successfully";
         // echo "<a href='./'>Go home</a>";
         header('Location: ./signin.php');
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }

   
   function login_user() {
      global $conn;
      $email_check = $conn->real_escape_string($_POST['email']);
      $password_check = $_POST['password'];
      $user = get_user_by_email($email_check);
      if ($user) {
         $password = explode(':', $user['password']);
         $hashed = $password[0];
         $salt = base64_decode($password[1]);
         $salted = $password_check . $salt;
         $hashed_check = hash('sha256', $salted);


         if($hashed_check == $hashed) {
            // echo "User logged in successfully";
            // echo "<a href='./'>Go home</a>";
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            header('Location: ./');
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
      // echo "user logged out successfully";
      // echo "<a href='./'>Go home</a>";
      header('Location: ./');
   }

   function create_post() {
      global $conn;
      $title = $conn->real_escape_string($_POST['title']);
      $content = $conn->real_escape_string($_POST['content']);
      $email = get_user_by_id($_SESSION['user_id'])['email'];
      $user_id = $_SESSION['user_id'];
      $sql = "INSERT INTO posts (user_id, email, title, content) VALUES ('$user_id', '$email', '$title', '$content')";
      $result = $conn->query($sql);
      if ($result) {
         // echo "Post created successfully";
         // echo "<a href='./'>Go home</a>";
         header('Location: ./');
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo "test";
   }

   function get_posts($user_id = null) {
      global $conn;
      $sql = "SELECT * FROM posts WHERE user_id = '$user_id' ORDER BY created_at DESC LIMIT 50";
      $user_id ? null : $sql = "SELECT * FROM posts ORDER BY Rand() LIMIT 50";
      $result = $conn->query($sql);
      $posts = $result->fetch_all(MYSQLI_ASSOC);
      return $posts;
   }

   function upload_pfp() {
      if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
         $tmp_name = $_FILES['image']['tmp_name'];
         $name = $_FILES['image']['name'];
         $type = $_FILES['image']['type'];
         $size = $_FILES['image']['size'];
         $resized_image = $_POST['resized_image'];
         $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $resized_image));
         $path = './images/pfp/' . $_SESSION['user_id'];
         if (file_put_contents($path, $data) !== false) {
           echo 'File uploaded successfully.';
           echo ' <a href="./">home</a>';
           header('Clear-Site-Data: "storage"');
         } else {
           echo 'File upload failed.';
         }
       } else {
         echo 'Error uploading file: ' . $_FILES['image']['error'];
       }
   }

   function update_name() {
      global $conn;
      $name = $conn->real_escape_string($_POST['name']);
      $sql = "UPDATE users SET name = '$name' WHERE id = " . $_SESSION['user_id'];
      $result = $conn->query($sql);
      if ($result) {
         header('Location: ./');
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   }


   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user']))
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
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload_pfp']))
   {
      upload_pfp();
   }
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_name']))
   {
      update_name();
   }

   //$result->free_result();

   //$conn->close();
 ?>