<?php
//Get Values
$email = $_POST['email'];
$password = md5($_POST['pwd']);
//Connect to DB
include "tes.php";

//Query
$result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'")
or die("Failed" .mysqli_error($conn));
$row=mysqli_fetch_array($result);
if (mysqli_num_rows($result)>0) {
    session_start();
    $_SESSION['email']=$email;
    header('location:../pages/dashboard-default.php');
} else {
    header('location:../pages/login.html');
}

?>