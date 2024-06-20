<?php
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

    <form action="handle_signup.php" method="post">
      <div class="link">
      <input type="text" name="name" placeholder="Enter your name" id="signup">
      <small style="color: red; "><?php if(isset($_SESSION["errors"]["name"])) echo $_SESSION["errors"]["name"]?></small>
      </div>
      <div class="link">
      <input type="text" name="phone" placeholder="phone" id="signup">
      <small style="color: red;"><?php if(isset($_SESSION["errors"]["phone"])) echo $_SESSION["errors"]["phone"]?></small>
      </div>
          <div class="link">
            <input type="email" name="email" placeholder="Email Address" id="signup">
            <small style="color: red; "><?php if(isset($_SESSION["errors"]["email"])) echo $_SESSION["errors"]["email"]?></small>
          </div>
          <div class="link">
            <input type="password" name="pw" placeholder="Password" id="signup" >
            <small style="color: red;"><?php if(isset($_SESSION["errors"]["pw"])) echo $_SESSION["errors"]["pw"]?></small>
          </div>
          <div class="link">
            <input type="password" name="pc" placeholder="Confirm password"id="signup" >
            <small style="color: red;"><?php if(isset($_SESSION["errors"]["pc"])) echo $_SESSION["errors"]["pc"]?></small>
          </div>
          <div class="link">
            <button type="submit" class="Signup">Signup</button>
          </div>
          <p class="p">already have an account?<a href="index.php">login now</a></p>
    </form>
  </div>
</div>
<!-- partial -->
  
</body>
</html>

<?php
$_SESSION["errors"]=null;
?>