<?php
session_start();
session_unset();

$_SESSION['username']=$_POST['username'];

session_destroy();
header('location:../index.php');





?>