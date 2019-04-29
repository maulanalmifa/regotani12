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
      </li>
    </ul>
    <ul class="navbar-nav mr-2" style="text-align:center; padding:10 0 0 10;">
        <li class="nav-item">
            <a class="nav-link" href="#">Notifikasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Cart</a>
        </li>
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
          <table class="table table-light">
            <tbody>
              <tr>
                <td style="width:150px;">
                  <img class="img-fluid" src="../img/17Padi.jpg" alt="">
                </td>
                <td>
                  <h5>Produk</h5>
                  <h6>Harga</h6>
                  <p>Penjual</p>
                  <a href="#" class="btn btn-primary" style="background-color:#006c5c; 
                  border:none; color: #ffcc00; width:100px; border-radius: 10px;">Beli</a>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
          <div class="col-7" style="background-color:#eee8d8; padding-top: 10px;">
            <!--Search & Filter-->
              <form class="form-inline" style="padding-bottom: 10px;">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:620px;">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color:#006c5c; 
                  border:none; color: #ffcc00;">Cari</button>
                  <div style="padding-left:10px;">
                  <!--Filter-->
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal" style="width:75px; 
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
                                  <h6 class="title">Brands </h6>
                                </header>
                                <div class="filter-content">
                                  <div class="card-body" style="text-align:left;">
                                  <form>
                                    <label class="form-check">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-label">
                                        Mersedes Benz
                                      </span>
                                    </label> <!-- form-check.// -->
                                    <label class="form-check">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-label">
                                        Nissan Altima
                                      </span>
                                    </label>  <!-- form-check.// -->
                                    <label class="form-check">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-label">
                                        Another Brand
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
            <table class="table" style="background-color: #fff;">
              <tbody>
                <tr>
                </tr>
                <tr>
                  <td style="width:250px;">
                    <img class="img-fluid" src="..\img\17Padi.jpg" alt=""></td>
                  <td>
                    <h6>Produk <span style="color:#ffcc00;">Nama Toko</span></h6>
                    <h4 style="color:#006c5c; font-weight:bold;">Harga</h4>
                    <p>Lokasi Toko</p>
                    <p>Nama Pasar</p>
                  </td>
                  <td align="right" style="vertical-align:middle;">
                    <a href="#" class="btn btn-primary" style="background-color:#006c5c; 
                    border:none; color: #ffcc00; width: 100px; border-radius: 10px;">Beli</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col" style="background-color:#eee8d8; padding-top:10px;">
            <h5 style="color:#006c5c">Perkembangan Harga</h5>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!--1) include file jquery.min.js dan higchart.js-->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script src="../js/highcharts.js"></script>

		<script type="text/javascript">
		//2)script untuk membuat grafik, perhatikan setiap komentar agar paham
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container-fluid', //letakan grafik di div id container
				//Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line',  
                marginRight: 10,
                marginBottom: 15
            },
            title: {
                text: 'Kategori',
                x: -20 //center
            },
            xAxis: { //X axis menampilkan data tahun 
                categories: ['Yesterday', 'Today']
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Dalam Rupiah'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },
            tooltip: { 
			//fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
			//akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'horizontal',
                align: 'right',
                verticalAlign: 'middle',
                x: -10,
                y: 100,
                borderWidth: 0
            },
			//series adalah data yang akan dibuatkan grafiknya,
			//saat ini mungkin anda heran, buat apa label indonesia dikanan 
			//grafik, namun fungsi label ini sangat bermanfaat jika
			//kita menggambarkan dua atau lebih grafik dalam satu chart,
			//hah, emang bisa? ya jelas bisa dong, lihat tutorial selanjutnya 
            series: [{  
                name: 'Kategori',  
				//data yang akan ditampilkan 
                data: [6000, 5400]
            }]
        });
    });
    
});
		</script>
<!--grafik akan ditampilkan disini -->
<div id="container-fluid" style="width: 95%; height: 60%; margin: 0;"></div>
          </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>