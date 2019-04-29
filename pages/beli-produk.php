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
  <div class="container-fluid">
  <?php
        include "tes.php";
        $id = $_GET['id_produk'];
        $query_beli = mysqli_query($conn,"SELECT p.*, u.nama, u.telepon FROM produk p INNER JOIN user u ON p.id_produk=$id AND p.id_user=u.id_user;")or die(mysqli_error($conn));
        $beli_produk = mysqli_fetch_array($query_beli);
        ?>
        <form action="../php_proses/proses_cart_pembeli.php" method="post">
      <div class="row" method="post" style="padding: 20px 0 0 20px;">
      <div class="form-group" style="text-align:left;">
          <input id="displayName" name="penjual" class="form-control" type="hidden" placeholder="Nama Produk" value="<?php echo $beli_produk['nama']?>"readonly>
          <h6><?php echo $beli_produk['nama']?></h6>
      </div>
      </div>
      <div class="row" style="padding-top:10px;">
        <div class="col-4">
          <img class="img-fluid" src="../img/17Padi.jpg" alt="" style="display: inline-block; width:400px; height:400px; background-repeat:no-repeat; background-position: center center; background-size:cover;" >
        </div>
      <div class="col-6">
      <div class="row">
      <div class="form-group" style="text-align:left;">
          <input id="displayName" name="nama_produk" class="form-control" type="hidden" placeholder="Nama Produk" value="<?php echo $beli_produk['nama_produk']?>"readonly>
          <h5><?php echo $beli_produk['nama_produk']?></h5>
      </div>
      </div>
        <div class="row">
        <div class="form-group" style="text-align:left;">
          <input id="displayName" name="harga" class="form-control" type="hidden" placeholder="Nama Produk" value="<?php echo $beli_produk['harga']?>"readonly>
          <h3><?php echo $beli_produk['harga']?> /Kg</h3>
        </div>
        </div>
        <div class="row">
        <div class="form-group" style="text-align:left;">
        <h6>Telepon Penjual</h6>
          <input name="telepon" class="form-control" type="hidden" placeholder="Nama Produk" value="<?php echo $beli_produk['telepon']?>"readonly>
          <p><?php echo $beli_produk['telepon']?></p>
        </div>
        </div>
        <div class="row">
            <h5>Information</h5>
        </div>
        <div class="row">
        <div class="form-group" style="text-align:left;">
          <textarea id="displayDesc" name="deskripsi" class="form-control" type="text" rows="4" cols="20" placeholder="Deskripsi Produk" value="<?php echo $beli_produk['deskripsi']?>"readonly></textarea>
        </div>
        </div>
        <div class="row">
          <div class="from-group">
          <label for="displayStok">Beli berapa Kg</label>
          <input id="displayStok" name="belistok" class="form-control" type="text" placeholder="... /Kg">
          <h6>Stok Sekarang <?php echo $beli_produk['stok']?></h6>
          </div>
        </div>
        </div>
        <div col="col-6">
        <div class="row">
        <div class="form-group" style="text-align:left;">
          <input id="displayName" name="id" class="form-control" type="hidden" placeholder="Nama Produk" value="<?php echo $beli_produk['id_produk']?>"readonly>
        </div>
            <button class="btn btn-success" type="submit" style="width:200px; height:70px; font-size: 32pt; font-weight: bold;">Beli</button><!--</a>-->
        </div>
        </div>  
        </div>
        </form>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>