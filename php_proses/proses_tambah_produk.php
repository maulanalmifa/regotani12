<?php
session_start();
include ("tes.php");
$sesi=$_SESSION['email'];
$nama=$_POST['inputName'];
$kategori=$_POST['inputKategori'];
$harga=$_POST['inputHarga'];
$stok=$_POST['inputStok'];
$desk=$_POST['inputDesc'];
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
    $query = mysqli_query($conn,"INSERT INTO produk (id_user,category,nama_produk,deskripsi,harga,stok,gambar) VALUES ((SELECT id_user FROM user WHERE id_user IN(SELECT id_user FROM user WHERE email='$sesi')),'$kategori','$nama','$desk',$harga,$stok,'$nama_gambar')") or die(mysqli_error($conn));
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