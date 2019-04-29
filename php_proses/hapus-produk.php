<?php
include "tes.php";
$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM produk WHERE id_produk='$id'");

header("location:../pages/produk-dagang.php");
?>