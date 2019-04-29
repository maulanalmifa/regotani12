<?php
include("tes.php");
$order=$_GET['order'];
mysqli_query($conn,"UPDATE cart_3 SET status='Selesai' WHERE kode_order =$order") or die(mysqli_error($conn));
header("location:../pages/cart.php");
?>