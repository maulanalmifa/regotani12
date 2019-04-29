<?php
if (isset($_POST['sendotp'])) {
	include "tes.php";
	$name = filter_input(INPUT_POST, 'firstname');
	$email = filter_input(INPUT_POST, 'email');
	$password = md5($_POST["pwd"]);
	$repassword = md5($_POST['pwdneh']);
	$sebagai = filter_input(INPUT_POST, 'sebagai');
	$wilayah = filter_input(INPUT_POST, 'wilayah');
	$telepon = filter_input(INPUT_POST,'phone');

$result = mysqli_query($conn,"INSERT INTO user (email,password,nama,alamat,telepon,wilayah,status) VALUES ('$email','$password','$name','$wilayah','$telepon','$wilayah','$sebagai')") or die(mysqli_error($conn));
	
header("location:../pages/login.html");
}
?>