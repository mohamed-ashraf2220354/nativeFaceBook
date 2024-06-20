<?php
session_start();
require_once("classes.php");
$user = unserialize ($_SESSION["user"]);
if (!empty($_REQUEST["unlike"])) {
    if (!empty($user->myLike($_REQUEST["post_id"], $user->id))) {
        $user->unlike($user->id,$_REQUEST["post_id"]);
        header("location:home.php?msg =unlike_done");
    }else{
        header("location:home.php?msg =already_unlike");
    }
}else{
    header("location:home.php?msg =requird_like");
}





// var_dump($_REQUEST["post_id"]);