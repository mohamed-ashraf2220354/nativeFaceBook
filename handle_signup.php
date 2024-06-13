<?php
session_start();
$errors =[];

if(empty($_REQUEST["name"])) $errors["name"]="Name is required";
if(empty($_REQUEST["phone"])) $errors["phone"]="Phone is required";
if(empty($_REQUEST["email"])) $errors["email"]="Email is required";
if(empty($_REQUEST["pw"]) || empty($_REQUEST["pc"])) {
    $errors["pw"]="Password And password confirmation is required";
}else if($_REQUEST["pw"] != $_REQUEST["pc"]){
    $errors["pc"]="Password confirmation must be equal to password";
}


$name= htmlspecialchars(trim($_REQUEST["name"]));
$phone =$_REQUEST["phone"];
$email =filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars($_REQUEST["pw"]);
$Password_confirmation= htmlspecialchars($_REQUEST["pc"]);

if (!empty($_REQUEST["email"]) && !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)) $errors["email"];

if (empty($errors)) {
    require_once('classes.php');
    try {
        $rslt = Subscriber::signup($name,$email,$phone,md5($password));
        header("location:login.php?msg=sr");
    } catch (\Throwable $th) {
        header("location:signup.php?msg=erorr");
    }
    
   
}else{
    $_SESSION["errors"]=$errors;
    header("location:signup.php");
}

