<?php

include "tes.php";
$id_produk = $_POST['displayId'];
$nama_produk = $_POST['displayName'];
$harga = $_POST['displayPrice'];
$stok = $_POST['displayStok'];

mysqli_query($conn,"UPDATE produk SET nama_produk = '$nama_produk', harga ='$harga', stok = '$stok' WHERE id_produk ='$id_produk' ");

header("location:../pages/produk-dagang.php");
?>
