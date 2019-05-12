<!DOCTYPE html>
<?php
session_start();
include 'tes.php';
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
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
    <h4 style="text-align:center; padding:10px;">Keranjangku</h4>
    <div class="row" style="text-align:center; padding-bottom:10px;">
      <div class="col">
          <p>Gambar</p>
      </div>
      <div class="col">
          <p>Nama Produk</p>
      </div>
      <div class="col">
        <p>Nama Penjual</p>
      </div>  
      <div class="col">
        <p>Telepon Penjual</p>
      </div>
      <div class="col">
        <p>Jumlah Beli</p>
      </div>
      <div class="col">
        <p>Total bayar</p>
      </div>
      <div class="col">
        <p>Timestamp</p>
      </div>
      <div class="col">
        <p>Action</p>
      </div>
    </div>
    <?php
    $ss=$_SESSION['email'];
    $query_cart = mysqli_query($conn,"SELECT * FROM cart_2 WHERE pembeli='$ss';") or die(mysqli_error($conn));
    while ($data_cart=mysqli_fetch_array($query_cart)) { ?>
    <div class="row" style="text-align:center;">
      <div class="col">
          <img class="img-fluid" src="<?php echo "../img/".$data_cart['gambar'];?>" alt="" style="display: inline-block; width:100px; height:100px; border-radius:30%; background-repeat:no-repeat; background-position: center center; background-size:cover;">
      </div>
      <div class="col">
          <h5><?php echo $data_cart['nama_produk'];?></h5>
      </div>
      <div class="col">
        <p><?php echo $data_cart['nama_penjual'];?></p>
      </div>  
      <div class="col">
        <h5><?php echo $data_cart['telepon_penjual'];?></h5>
      </div>
      <div class="col">
        <h6><?php echo $data_cart['jumlah_beli'];?> Kg</h6>
      </div>
      <div class="col">
        <h6>Rp <?php echo $data_cart['total_bayar'];?></h6>
      </div>
      <div class="col">
        <h6><?php echo $data_cart['tanggal'];?></h6>
      </div>
      <div class="col">
      <?php
      if($data_cart['status']=="Baru Saja"){
      ?>
        <a href="../php_proses/batal.php?order=<?php echo $data_cart['kode_order']?>"><button class="btn btn-danger" type="button">Batal</button></a>
      <?php }elseif($data_cart['status']=="Proses"){
        ?>
        <a href="../php_proses/selesai.php?order=<?php echo $data_cart['kode_order']?>"><button class="btn btn-primary" type="button">Selesai</button></a>
      <?php }elseif($data_cart['status']=="Selesai"){
        ?>
        <p>Transaksi Selesai</p>
      </div>
      <?php }else{ ?>
      <p>Transaksi Selesai, Terkonfirmasi</p>
      <?php } ?>
    </div>
    </div>
      <?php }
    ?>
</div>
</div>
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
?>