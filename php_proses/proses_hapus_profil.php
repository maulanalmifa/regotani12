<?php
session_start();
include("tes.php");
$id=$_SESSION['email'];

mysqli_query($conn,"DELETE FROM user WHERE email='$id';") or die(mysqli_error($conn));
header("location:../pages/login.html");