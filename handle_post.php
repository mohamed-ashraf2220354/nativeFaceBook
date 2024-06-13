<?php
session_start();

require_once("classes.php");
if (!empty($_REQUEST["title"])) {
    require_once('classes.php');
    $user =unserialize ($_SESSION["user"]);

    if ($_FILES["image"]["name"]) {
        $imageName="./img/".$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],$imageName);
    }else{
        $imageName=null;
    }
    

    $user->store_posts($_REQUEST["title"],$imageName,$user->id);
    header("location:home.php?msg=sharihg post");

}else{
    header("location:home.php?msg=requird_faild");
}




