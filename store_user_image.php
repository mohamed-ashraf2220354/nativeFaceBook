<?php
session_start();
require_once("classes.php");
$user =unserialize ($_SESSION["user"]);
if (!empty($_FILES["image"]["name"])) {
    $imagename="./img/user/".$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],$imagename);
    $user-> update_user_image($imagename,$user->id);
    $user -> image =$imagename;
    $_SESSION["user"]=serialize($user);
    header("location:profile.php?msg =update_done");
}else{
    header("location:profile.php?msg =requird_image");
}