<?php


session_start();

if (!isset($_SESSION["login"])){
      header("Location: log.php");
      exit;



}

// koneksi ke dtbs

require('functions.php');



    //ambil data

$pembelian = query ("SELECT * FROM pembelian ORDER BY id_pembelian DESC");




//tombol cari

if ( isset($_POST["cari_pembelian"])){
    $pembelian = cari_pembelian($_POST["keyword"]);



}

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
            <h2>ADMIN E-Teknologi</h2>          
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
        
        <button class="btn btn-default" type="submit" name="cari_pembelian" style="margin-left: 30px;"> Cari</button>
      </span>

      <input type="text" name="keyword" autofocus class="form-control" placeholder="masukan keyword pencarian.." autocomplete="off" style=" width: 95%; ">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
 </div>
 </form>


  <!-- keranjang -->
<section class="keranjang" >  
  <div class=" container pos_keranjang">
    <a href=""><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>





<br><br><br>

<section class="ket_pembelian">
      <div class="container">
      <h1 style="text-align: center; margin-top: 50px;">Daftar Pembelian</h1><hr style=" width:30%;"> 
        <table border="1" cellpadding="10" cellspacing="0" class="table table-striped" >  
          <tr class="danger">
            <td>NO</td>
            <td>Tanggal</td>
            <td>Nama</td>
            <td>Total</td>
            <td>Aksi</td>
          </tr>

              <?php $nomor = 1; ?>
     <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian "); ?>
                       <?php while($pembelian = $ambil->fetch_assoc()){?>
          
          <tr>
            <td><?= $nomor; ?></td>
            <td><?= $pembelian['tanggal_pembelian']; ?></td>
            <td><?= $pembelian['nama_pelanggan']; ?></td>
            <td><?= $pembelian['total_pembelian']; ?></td>
            <td>  <a href="detail.php?halaman=detail&id=<?= $pembelian["id_pembelian"]; ?> " class="btn btn-info">detail</a></td>
          </tr>
              <?php $nomor++; ?>
              <?php }?>
      </div>
</section>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>



  </body>
</html>