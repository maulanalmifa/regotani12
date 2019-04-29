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
        <div class="row">
          <!--Rekomen-->
          <div class="col-3" style="background-color: #eee8d8; padding-top: 10px;">
            <h5 style="color:#006c5c;">Rekomendasi</h5>
          <?php
          include "tes.php";
          $sesi=$_SESSION['email']; 
          $status=mysqli_query($conn,"SELECT * FROM user WHERE email='$sesi'") or die(mysqli_error($conn));
          $statuse=mysqli_fetch_array($status);
          $level=$statuse['status'];
          if ($level=='Pedagang' or $level=='Petani') {
          $query_produk = mysqli_query($conn,"SELECT p.id_produk, p.nama_produk, u.nama, u.status, u.telepon, MIN(p.harga) FROM produk p INNER JOIN user u ON p.id_user=u.id_user GROUP BY p.nama_produk HAVING status='Petani' LIMIT 6;")or die(mysqli_error($conn));
          while ($data_produk = mysqli_fetch_array($query_produk)) {
          ?>
          <table class="table table-light">
            <tbody>
              <tr>
                <td style="width:150px;">
                  <img class="img-fluid" src="../img/17Padi.jpg" alt="">
                </td>
                <td>
                  <h5><?php echo $data_produk['nama_produk'] ?></h5>
                  <h6><?php echo $data_produk['MIN(p.harga)'] ?></h6>
                  <p><?php echo $data_produk['nama'] ?></p>
                  <a href="beli-produk.php?id_produk=<?php echo $data_produk['id_produk']?>&id_user=<?php echo $data_produk['nama']?>&no=<?php echo $data_produk['telepon']?>"><button class="btn btn-primary" style="background-color:#006c5c; 
                  border:none; color: #ffcc00; width:100px; border-radius: 10px;">Beli</button></a>
                </td>
              </tr>
            </tbody>
          </table>
          <?php }
          } else {
              $query_produk = mysqli_query($conn,"SELECT p.id_produk, p.nama_produk, u.nama, u.status, u.telepon, MIN(p.harga) FROM produk p INNER JOIN user u ON p.id_user=u.id_user GROUP BY p.nama_produk LIMIT 6;")or die(mysqli_error($conn));
              while ($data_produk = mysqli_fetch_array($query_produk)) {
              ?>
              <table class="table table-light">
                <tbody>
                  <tr>
                    <td style="width:150px;">
                      <img class="img-fluid" src="../img/17Padi.jpg" alt="">
                    </td>
                    <td>
                      <h5><?php echo $data_produk['nama_produk'] ?></h5>
                      <h6><?php echo $data_produk['MIN(p.harga)'] ?></h6>
                      <p><?php echo $data_produk['nama'] ?></p>
                      <a href="beli-produk.php?id_produk=<?php echo $data_produk['id_produk']?>&id_user=<?php echo $data_produk['nama']?>&no=<?php echo $data_produk['telepon']?>"><button class="btn btn-primary" style="background-color:#006c5c; 
                      border:none; color: #ffcc00; width:100px; border-radius: 10px;">Beli</button></a>
                    </td>
                  </tr>
                </tbody>
              </table><?php }
              } ?>
          </div>
          <div class="col-7" style="background-color:#eee8d8; padding-top: 10px;">
            <!--Search & Filter-->
              <form class="form-inline" style="padding-bottom: 10px;">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:620px;">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color:#006c5c; 
                  border:none; color: #ffcc00;">Cari</button>
                  <div style="padding-left:10px;">
                  <!--Filter-->
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal" style="width:60px; 
                    border:#006c5c; color: #006c5c;">
                  Filter</button>
                </div>  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" >
                          <div class="card">
                              <article class="card-group-item">
                                <header class="card-header">
                                  <h6 class="title">Example</h6>
                                </header>
                                <div class="filter-content" style="position: relative; left:-38%;">
                                  <div class="card-body" style="text-align:left;">
                                  <form>
                                    <label class="form-check">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-label">
                                        Example1
                                      </span>
                                    </label> <!-- form-check.// -->
                                    <label class="form-check">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-label">
                                        Example2
                                      </span>
                                    </label>  <!-- form-check.// -->
                                    <label class="form-check">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-label">
                                        Example3
                                      </span>
                                    </label>  <!-- form-check.// -->
                                  </form>
                            
                                  </div> <!-- card-body.// -->
                                </div>
                              </article> <!-- card-group-item.// -->
                              </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#ff0000; 
                        border:none; color: #fff;">Batal</button>
                        <button type="button" class="btn btn-primary" style="background-color:#006c5c; 
                        border:none; color: #ffcc00;">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <!--Primer-->
              <?php
                  $sesi=$_SESSION['email'];
                  $status=mysqli_query($conn,"SELECT * FROM user WHERE email='$sesi'") or die(mysqli_error($conn));
                  $statuse=mysqli_fetch_array($status);
                  $level=$statuse['status'];
                  if ($level=='Pembeli') { 
              $query_display_produk = mysqli_query($conn,"SELECT p.id_produk, p.nama_produk, u.nama, u.telepon, p.harga, u.basis_dagang, u.status FROM produk p INNER JOIN user u ON p.id_user=u.id_user HAVING status='Pedagang';")or die(mysqli_error($conn));
              while ($display_produk = mysqli_fetch_array($query_display_produk)) {
              ?>
            <table class="table" style="background-color: #fff;">
              <tbody>
                <tr>
                </tr>
                <tr>
                  <td style="width:250px;">
                    <img class="img-fluid" src="..\img\17Padi.jpg" alt=""></td>
                  <td>
                    <h6><?php echo $display_produk['nama_produk'];?> <span style="color:#ffcc00;"><?php echo $display_produk['nama'];?></span></h6>
                    <h4 style="color:#006c5c; font-weight:bold;"><?php echo $display_produk['harga'];?><h6 style="font-size:12pt; color:#000;">/Kg<h6></h4>
                    <p><?php echo $display_produk['basis_dagang']?></p>
                    <p><?php echo $display_produk['telepon']?></p>
                  </td>
                  <td align="right" style="vertical-align:middle;">
                    <a href="beli-produk.php?id_produk=<?php echo $display_produk['id_produk']?>&id_user=<?php echo $display_produk['nama']?>&no=<?php echo $display_produk['telepon']?>"><button class="btn btn-primary" type="button" style="background-color:#006c5c; 
                    border:none; color: #ffcc00; width: 100px; border-radius: 10px;">Beli</button></a>
                  </td>
                </tr>
              </tbody>
            </table>
              <?php }
            } else {
              $query_display_produk = mysqli_query($conn,"SELECT p.id_produk, p.nama_produk, u.nama, u.telepon, p.harga, u.basis_dagang, u.status FROM produk p INNER JOIN user u ON p.id_user=u.id_user HAVING status='Petani';")or die(mysqli_error($conn));
              while ($display_produk = mysqli_fetch_array($query_display_produk)) {
              ?>
            <table class="table" style="background-color: #fff;">
              <tbody>
                <tr>
                </tr>
                <tr>
                  <td style="width:250px;">
                    <img class="img-fluid" src="..\img\17Padi.jpg" alt=""></td>
                  <td>
                    <h6><?php echo $display_produk['nama_produk'];?> <span style="color:#ffcc00;"><?php echo $display_produk['nama'];?></span></h6>
                    <h4 style="color:#006c5c; font-weight:bold;"><?php echo $display_produk['harga'];?><h6 style="font-size:12pt; color:#000;">/Kg<h6></h4>
                    <p><?php echo $display_produk['basis_dagang']?></p>
                    <p><?php echo $display_produk['telepon']?></p>
                  </td>
                  <td align="right" style="vertical-align:middle;">
                    <a href="beli-produk.php?id_produk=<?php echo $display_produk['id_produk']?>"><button class="btn btn-primary" type="button" style="background-color:#006c5c; 
                    border:none; color: #ffcc00; width: 100px; border-radius: 10px;">Beli</button></a>
                  </td>
                </tr>
              </tbody>
            </table>
              <?php }
              } ?>
          </div>
        <div class="col-2" style="background-color:#eee8d8; padding-top:10px; position:relative;">
            <h5 style="color:#006c5c">Perkembangan Harga</h5>
            <div class="col">
            <?php
            $query_display_harga = mysqli_query($conn,"SELECT nama_produk, AVG(harga), MAX(harga) FROM produk GROUP BY nama_produk;")or die(mysqli_error($conn));
            while ($display_harga = mysqli_fetch_array($query_display_harga)) {
            ?>
            <div class="row" style="background:#fff; padding-top:10px;">
            <div class="col">
            <table class="table table-light">
              <tbody>
                <tr>
                  <h6><?php echo $display_harga['nama_produk']?></h6>
                </tr>
                <tr>
                  <td>
                  <h6><?php echo $display_harga['MAX(harga)']?></h6> <p>Tertinggi</p>
                  </td>
                  <td>
                  <h6><?php echo ceil($display_harga['AVG(harga)'])?></h6><p>Hari Ini</p>
                  </td>
                </tr>
              </tbody>
            </table> 
            </div> 
        </div> <?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>