<?php
include ("tes.php");
$order=$_GET['order'];
mysqli_query($conn,"DELETE FROM transaksi_pembeli WHERE kode_order=$order;") or die(mysqli_error($conn));
header("location:../pages/cart.php");
?>