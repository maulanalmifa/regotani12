<?php
session_start();
include ("tes.php");
$sesi=$_SESSION['email'];
$nama=$_POST['inputName'];
$kategori=$_POST['inputKategori'];
$harga=$_POST['inputHarga'];
$stok=$_POST['inputStok'];
$desk=$_POST['inputDesc'];

mysqli_query($conn,"INSERT INTO produk (id_user,category,nama_produk,deskripsi,harga,stok) VALUES ((SELECT id_user FROM user WHERE id_user IN(SELECT id_user FROM user WHERE email='$sesi')),'$kategori','$nama','$desk',$harga,'$stok')") or die(mysqli_error($conn));

header("location:../pages/produk-dagang.php");
?>