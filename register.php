<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
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
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="login">
      <video id="video1" autoplay muted loop>
        <source src="./assets/video/play.mp4" type="video/mp4" />
      </video>
   <form action="" method="post" class="form" enctype="multipart/form-data">
      <h1 class="head">Register</h1>
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

          <div class="content">
            <div class="box">
              <i class="ri-user-3-line login__icon"></i>
  
              <div class="box-input">
                <input
                  name="name"
                  type="text"
                  required
                  class="input"
                  id="login-username"
                  placeholder=" "
                />
                <label for="login-username" class="login__label">UserName</label>
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
          <div class="box">
            <i class="ri-lock-2-line login__icon"></i>

            <div class="box-input">
              <input
                name="cpassword"
                type="password"
                required
                class="input"
                id="confirm-pass"
                placeholder=" "
              />
              <label for="login-pass" class="login__label">Confirom Password</label>
              <i class="ri-eye-off-line login__eye" id="login-eye"></i>
            </div>
          </div>

        </div>
        <div><input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"></div>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>
</div>
   <script src="assets/js/main.js"></script>
</body>
</html>