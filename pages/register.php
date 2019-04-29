<!DOCTYPE html>
<?php
include "tes.php";
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="..\bootstrap-4.3.1-dist\css\bootstrap.min.css">
<link rel="stylesheet" href="..\cusstyle\style.css">
<title>Daftar RegoTani</title>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4" col-lg-5 mx-auto">
      <div class="card" style="background-color:#006c5c; border-radius: 30px; position:absolute; width:inherit; top:50px; left:800px;">
        <div class="card-body">
          <h3 class="card-title text-center" style="color:#eee8d8; text-transform: uppercase; font-weight: bolder;">Register</h3>
              <!--Form-->
            <form method="POST" action="../php_proses/proses_daftar.php">  
              <div class="row">
                <div class="form-group form-inline">
                    <div class="col-md-6">
                      <div class="form-group">
                         <label for="inputFirst" style="color:#ffcc00">First Name</label>
                         <input id="inputFirst" name="firstname" type="text" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00;"/>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputLast" style="color:#ffcc00">Last Name</label>
                        <input id="inputLast" name="lastname" type="text" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00;"/>
                      </div>
                    </div><!-- /.col -->
                  </div>
                </div>
                <div class="row">
                    <div class="form-group">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputEmail" style="color:#ffcc00;">Email</label>
                          <input id="inputEmail" name="email" type="email" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00; width: 400px;"/>
                        </div>
                      </div><!-- /.col -->
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-inline">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="inputPassword" style="color:#ffcc00">Buat Password</label>
                             <input id="inputPassword" name="pwd" type="password" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00;"/>
                          </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="confirmPassword" style="color:#ffcc00">Konfirmasi Password</label>
                            <input id="confirmPassword" name="pwdneh" type="password" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00;"/>
                          </div>
                        </div><!-- /.col -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-inline">
                        <div class="col-md-6">
                            <div class="form-group" style="width:200px;">
                                <select class="form-control" name="sebagai" id="exampleFormControlSelect1" style="background-color:#ffcc00; color:#006c5c; border:none; border-radius: 20px;">
                                  <option>Sebagai :</option>
                                  <option value="Petani">Petani</option>
                                  <option value="Pedagang">Pedagang</option>
                                  <option value="Pembeli">Konsumen</option>
                                </select>
                              </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputWilayah" style="color:#ffcc00">Wilayah</label>
                            <input id="inputWilayah" name="wilayah" type="text" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00;"/>
                          </div>
                        </div><!-- /.col -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputPhone" style="color:#ffcc00;">No. Telp</label>
                            <input id="inputPhone" name="phone" type="tel" style="border: none; border-bottom: 2px solid #ffcc00; background: none;color:#ffcc00; width: 400px;"/>
                          </div>
                        </div><!-- /.col -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-inline">
                        <div class="col-md-6">
                          <div class="form-group">
                              <div class="checkbox">
                                <label style="color:#eee8d8;">
                                  <input type="checkbox" aria-required="true"> Saya menyetujui segala kebijakan privasi dan aturan lisensi
                                </label>
                              </div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                          <a href="otp.html"><button class="btn btn-primary" name="sendotp" type="submit" style="width: 180px; font-weight: bolder; font-size: larger;">Daftar</button></a>
                        </div><!-- /.col -->
                      </div>
                    </div>
                </form>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>
    </div>
  </div>
  <a href="login.html"><button class="btn btn-secondary" href="login.html" type="button" style="position:absolute; left:30px; border: none; border-radius:60px; bottom:30px; padding:10px; font-weight:bolder; background-color: #006c5c; color:#ffcc00; text-decoration:none;">Punya akun? LOGIN</button></a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>