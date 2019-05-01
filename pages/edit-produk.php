<!DOCTYPE html>
<?php
session_start();
include 'tes.php';
?>
<html lang="en" style="background-color:#eee8d8;">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="..\bootstrap-4.3.1-dist\css\bootstrap.min.css">
<title>RegoTani</title>
</head>
<body>
  <style>
    a{
      text-decoration: none;
      color: #ffcc00;
    }
    a:hover{
      color: #ffcc00;
    }
  </style>
  <!--navbar-->
<nav class="navbar navbar-expand-lg" style="background-color: #006c5c; padding: 10px;">
  <a class="navbar-brand" href="dashboard-default.php" style="font-size:24px; font-weight:bold; text-transform: uppercase;">RegoTani</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
        <?php
    $sesi=$_SESSION['email']; 
    $status=mysqli_query($conn,"SELECT * FROM user WHERE email='$sesi'") or die(mysqli_error($conn));
    $statuse=mysqli_fetch_array($status);
    $level=$statuse['status'];
    if ($level=='Pedagang' or $level=='Petani') { ?>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="produk-dagang.php">Produkku</a>
    <?php } ?>
    </ul>
    <ul class="navbar-nav mr-2" style="text-align:center; padding:10 0 0 10;">
    <?php
    $sesi=$_SESSION['email']; 
    $status=mysqli_query($conn,"SELECT * FROM user WHERE email='$sesi'") or die(mysqli_error($conn));
    $statuse=mysqli_fetch_array($status);
    $level=$statuse['status'];
    if ($level=='Pedagang' or $level=='Petani') { ?>
        <li class="nav-item">
            <a class="nav-link" href="notifikasi-pedagang.php">Notifikasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
        </li>
    <?php } else { ?>
      <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li> <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="profile.php">Profil <?php echo $_SESSION['email'] ?></a>
        </li>
    </ul>
  </div>
</nav>
<div class="container-fluid" style="background-color:#eee8d8; text-align: center; padding-top:10px;">
        <div class="row justify-content-md-center">
            <h4 style="color:#006c5c;">Edit Produkku</h4>
        </div>
        <?php
        include "tes.php";
        $id = $_GET['id_produk'];
        $nama=$_GET['nama_produk'];
        $query_edit = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '$id'")or die(mysqli_error());
        while($edit_produk = mysqli_fetch_array($query_edit)){
        ?>
        <form action="..\php_proses\update-produk.php" method="post" enctype="multipart/form-data">
        <div class="col">
        <div class="row justify-content-md-left">
                <div class="col-2">
                    <img class="img-fluid" src="<?php echo "../img/".$edit_produk['gambar'];?>" alt="" style="display: inline-block; width:100px; height:100px; border-radius:30%; background-repeat:no-repeat; background-position: center center; background-size:cover;">
                    <input type="file" name="file">
                </div>
                <div class="col-6">
                    <div class="form-group" style="text-align:left;">
                        <label for="displayName">Name</label>
                        <input id="displayName" name="displayName" class="form-control" type="text" placeholder="Nama Produk" value="<?php echo $edit_produk['nama_produk']?>">
                    </div>   
                </div>
            </div>
            <div class="row justify-content-md-left">
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <div class="form-group" style="text-align:left;">
                        <label for="displayId">Id</label>
                        <input id="displayId" name="displayId" class="form-control" type="text" placeholder="Id" value="<?php echo $edit_produk['id_produk']?>" readonly>
                    </div>   
                </div>
            </div>
            <div class="row justify-content-md-left">
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <div class="form-group" style="text-align:left;">
                        <label for="displayPrice">Harga</label>
                        <input id="displayPrice" name="displayPrice" class="form-control" type="text" placeholder="Harga" value="<?php echo $edit_produk['harga']?>">
                    </div>   
                </div>
            </div>
            <div class="row justify-content-md-left">
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    <div class="form-group" style="text-align:left;">
                        <label for="displayStok">Update Stok</label>
                        <input id="displayStok" name="displayStok" class="form-control" type="text" placeholder="Stok" value="<?php echo $edit_produk['stok'] ?>">
                    </div>   
                </div>
                <div class="col-2">
                    <div class="form-group" style="text-align:left; padding:10px; padding-top:30px;">
                      <button type="button" class="btn btn-primary" style="background-color:#006c5c; border:none; color: #ffcc00;">Edit Deskripsi Produk</button>  
                    </div>   
                </div>
            </div>
            <div class="row" style="padding-top:10px;">
                <div class="col-8">
                  <a href="produk-dagang.php"><button type="button" class="btn btn-danger" style="">Batal</button></a>
                  <button type="submit" class="btn btn-primary" style="background-color:#006c5c; 
                        border:none; color: #ffcc00;">Simpan</button>
                </div>
        </div>
  </div>
  </form> 
<?php } ?>
<table class="table table-dark" style="padding-top:10px; background:#">
  <?php
  $id=$_GET['id_produk'];
  $nama=$_GET['nama_produk'];
  $query_ref=mysqli_query($conn,"SELECT nama_produk, AVG(harga), MIN(harga), MAX(harga) FROM produk WHERE nama_produk LIKE '$nama%';") or die(mysqli_error($conn));
  while($ref=mysqli_fetch_array($query_ref)){
  ?>
  <tbody>
    <tr>
      <td>Referensi</td>
      <td>Rata-rata</td>
      <td>Harga Terendah</td>
      <td>Harga Tertinggi</td>
    </tr>
    <tr>
      <td><?php echo $ref['nama_produk']?></td>
      <td><?php echo ceil($ref['AVG(harga)'])?></td>
      <td><?php echo $ref['MIN(harga)']?></td>
      <td><?php echo $ref['MAX(harga)']?></td>
    </tr>
  </tbody> <?php } ?>
</table>
</div>