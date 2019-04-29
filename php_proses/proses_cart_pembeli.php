<?php
session_start();
include "tes.php";
$telp=$_POST['telepon'];
$ss=$_SESSION['email'];
$id_produk=$_POST['id'];
$penjual=$_POST['penjual'];
$jumlah=$_POST['belistok'];

mysqli_query($conn,"INSERT INTO transaksi_pembeli (email_pembeli, nama_penjual, telepon_penjual,id_produk, jumlah_beli) VALUES ('$ss','$penjual','$telp',$id_produk,$jumlah)") or die(mysqli_error($conn));

header("location:../pages/cart.php");
?>