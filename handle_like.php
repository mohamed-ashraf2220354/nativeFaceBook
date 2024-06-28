<?php
session_start();
require_once("classes.php");
$user = unserialize ($_SESSION["user"]);
if (!empty($_REQUEST["like"])) {
    if (empty($user->myLike($_REQUEST["post_id"], $user->id))) {
        $user->store_like($user->id,$_REQUEST["post_id"]);
        header('Location: ' . $_SERVER['HTTP_REFERER'] ."?msg =like_done");
    } else{
        $user->unlike($user->id,$_REQUEST["post_id"]);
        header('Location: ' . $_SERVER['HTTP_REFERER'] ."?msg =unlike_done");
    }

}else{
    header("location:home.php?msg =requird_like");
}


// var_dump($_REQUEST["post_id"]);