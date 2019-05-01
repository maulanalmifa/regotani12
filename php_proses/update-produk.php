<?php

include "tes.php";
$id_produk = $_POST['displayId'];
$nama_produk = $_POST['displayName'];
$harga = $_POST['displayPrice'];
$stok = $_POST['displayStok'];
# gambar
$ekstensi = array('png','jpg','JPG','PNG','jpeg');
$nama_gambar = $_FILES['file']['name'];
$x = explode('.', $nama_gambar);
$extention = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

if (in_array($extention,$ekstensi)==true) {
    if ($ukuran<1048576) {
    move_uploaded_file($file_tmp, '../img/'.$nama_gambar);
    $query = mysqli_query($conn,"UPDATE produk SET nama_produk = '$nama_produk', harga ='$harga', stok = '$stok', gambar='$nama_gambar' WHERE id_produk ='$id_produk' ");
    if($query){
        header("location:../pages/produk-dagang.php");
    }else{
        echo "Gagal Upload";
    }	
    }else{
        echo "File Terlalu besar";
    }
}else{
    echo "Ekstensi Salah";
}
?>
