<?php
session_start();
require_once('classes.php');
$user =unserialize ($_SESSION["user"]);


if (empty($user = unserialize($_SESSION["user"]))) {
  header("location:./login.php?msg=required_auth");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Facebook home Page</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="./image/logo.png" type="image/x-icon" />
</head>

<body>
  <nav>
    <div class="nav-left">
      <img src="./image/logo.png" alt="logo" />
      <input type="text" placeholder="search facebook.." />
    </div>

    <div class="nav-middle">
      <a href="home.php" class="active">
        <i class="fa fa-home"></i>
      </a>
      <a href="#">
        <i class="fa fa-user-friends"></i>
      </a>
      <a href="#">
        <i class="fa fa-users"></i>
      </a>
      <a href="#">
        <i class="fa fa-play-circle"></i>
      </a>
    </div>

    <div class="nav-right">
      <span class="profile"> </span>

      <a href="#">
        <i class="fa fa-bell"></i>
      </a>
      <a href="#">
        <i class="fas fa-ellipsis-h"></i>
      </a>
    </div>
  </nav>