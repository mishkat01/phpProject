<?php session_start();
include("includes/db.php");
unset($_SESSION['role']);
unset($_SESSION['login']);
header("location:index.php");
?>