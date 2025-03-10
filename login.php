<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <link rel="website icon" type="png" href="./assets/img/Untold Coding.png" />

    <link rel="stylesheet" href="assets/css/styles.css" />
   <title>login</title>r

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="login">
   <video id="video1" autoplay muted loop>
        <source src="./assets/video/play.mp4" type="video/mp4" />
   </video>

   <form action="" method="post" enctype="multipart/form-data" class="form" >
      <h1 class="head">Login</h1>
      <?php
      if(isset($message)){
         foreach($message as $message){ 
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <div class="content">
          <div class="box">
            <i class="ri-user-3-line login__icon"></i>

            <div class="box-input">
              <input
                name="email"
                type="email"
                required
                class="input"
                id="login-email"
                placeholder=" "
              />
              <label for="login-email" class="login__label">Email</label>
            </div>
          </div>

          <div class="box">
            <i class="ri-lock-2-line login__icon"></i>

            <div class="box-input">
              <input
                name="password"
                type="password"
                required
                class="input"
                id="login-pass"
                placeholder=" "
              />
              <label for="login-pass" class="login__label">Password</label>
              <i class="ri-eye-off-line login__eye" id="login-eye"></i>
            </div>
          </div>
        </div>

        <div class="tick">
          <div class="tick-group">
            <input type="checkbox" class="tick-input" id="login-check" />
            <label for="login-check" class="tick-label">Remember me</label>
          </div>

          <a href="#" class="forgot">Forgot Password?</a>
        </div>

        <button type="submit" name="submit" class="btn">Login</button>

        <p class="register">Don't have an account? <a href="register.php">Register</a></p>
      </form>
    </div>

    <script src="assets/js/main.js"></script>
   </form>

</div>

</body>
</html>