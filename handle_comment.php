<?php
session_start();
require_once("classes.php");
$user =unserialize ($_SESSION["user"]);
if (!empty($_REQUEST["comment"])) {
    $user->store_comment($_REQUEST["comment"],$user->id);
    header("location:home.php?msg =comment_done");
}else{
    header("location:comments.php?msg =requird_comment");
}


var_dump($_REQUEST["post_id"]);
