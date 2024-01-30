<?php

session_start();

if (!isset($_SESSION["login"])){
      header("Location: log.php");
      exit;



}


// koneksi ke dtbs

require('functions.php');


//ambil data

$pembeli = query ("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CV Pusat E-Teknologi</title>

    <!-- Bootstrap -->
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

body {
        background-image: url(img/sky.png);
}

 </style>

 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<!-- jumbotron/tampilan header -->
<section class="background_nav">
        <div class="jumbotron jumbotron-edit">  
          <div class="wlc container visible-xs-*">
            <h2 style="">ADMIN E-Teknologi</h2>          
            </div>
          </div>
        </div>
 </section>

<!-- navigasi -->
<section class=" posisi-admin" style="">
  <div class="topnav container">
  <a href="admin.php">Admin</a>
  <a href="produk.php">Produk</a>
  <a href="pelanggan.php">Pelanggan</a>
  <a href="pembelian.php">Pembelian</a>
  <a href="logout.php">Logout</a>
</div>
</section>




<!-- search -->
<section >

<form action="" method="post">
<div class="row container pos_search">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        
        <button class="btn btn-default" type="submit" name="cari_pembeli" style="margin-left: 30px;"> Cari</button>
      </span>
      <input type="text" name="keyword" autofocus class="form-control" placeholder="masukan keyword pencarian.." autocomplete="off" style=" width: 95%; ">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
 </div>
 </form>



  <!-- keranjang -->
<section class="keranjang" >  
  <div class=" container pos_keranjang">
    <a href="keranjang.php"><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>


<br><br><br><br>

<section class="konten">
    <div class="container" style="text-align: center; color: white; ">
        <h1>WELCOME TO ADMIN</h1>
        <hr style="width: 40%;">
    </div>
</section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>

<img src="img/sky.png">

  </body>
</html>