<?php
session_start();



$email = filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars($_REQUEST["password"]);

if (!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {
    
    require_once('classes.php');
    $user =users::login($_REQUEST["email"], md5($_REQUEST["password"]));
   
    if (!empty($user)) {
        $_SESSION ["user"] = serialize($user);
        if($user->role == "admin"){
            header("location:admin.php?msg=your_admin");
        }elseif ($user->role == "subscriber") {
            header("location:home.php?msg=your_user");
        }
    }else{
        header("location:login.php?msg=no_user");

    }

}else{
    header("location:login.php?msg=empty_field");
}



