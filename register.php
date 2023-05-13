<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Password does not match!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Registered Successfully!';
         header('location:login.php');
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
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   <div class="video-wrapper">
   <video playsinline autoplay muted loop poster="images/AgricultureRegister.png">
    <!--<source src="images/MM.mp4" type="video/mp4">-->
   </video>
   </div>
<div class="form-containers">

   <form action="" method="post" style = "opacity: 0.8;">
   <div class="share">
         <img src="cropcomm_logo.png" class="responsive">
         </div>
      <h3>Register Now</h3>
      <input type="text" name="name" placeholder="Enter Name" required class="box">
      <input type="email" name="email" placeholder="Enter Email" required class="box">
      <input type="password" name="password" placeholder="Enter Password" required class="box">
      <input type="password" name="cpassword" placeholder="Confirm Password" required class="box">
      <select name="user_type" class="box">
         <option value="user">CUSTOMER</option>
         <option value="admin">ADMIN</option>
      </select>
      <input type="submit" name="submit" style= "background-color: #f1a507" value="register now" class="btn">
      <p>Already have an account? <a href="login.php" >Click this</a></p>
   </form>

</div>

</body>
</html>