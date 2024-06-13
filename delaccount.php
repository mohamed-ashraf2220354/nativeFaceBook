<?php
session_start();
require_once("classes.php");
$user = unserialize($_SESSION["user"]);

$user->delete($_REQUEST["user_id"]);

header("location:admin.php?msg = remove_done");


