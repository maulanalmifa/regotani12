<?php
session_start();
include("tes.php");
$id=$_SESSION['email'];
$nama=$_POST['displayName'];
$alamat=$_POST['displayAddress'];
$telepon=$_POST['displayPhone'];
$status=$_POST['displayStatus'];
$basis=$_POST['displayBasis'];

if ($status=="Pedagang" or $status="Petani") {
    mysqli_query($conn,"UPDATE user SET nama='$nama', alamat='$alamat', telepon=$telepon, basis_dagang='$basis' WHERE email='$id'") or die(mysqli_error($conn));
header("location:../pages/profile.php");
} else {
    mysqli_query($conn,"UPDATE user SET nama='$nama', alamat='$alamat', telepon=$telepon, WHERE email='$id'") or die(mysqli_error($conn));
header("location:../pages/profile.php");
}
?>