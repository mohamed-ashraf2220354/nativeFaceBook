<?php
session_start();
require_once('classes.php');
$user =unserialize ($_SESSION["user"]);

var_dump($_FILES);