<?php

  

    session_start();

   $conn = mysqli_connect("localhost","root","","cv_pusat_e_teknologi");


    if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))

    {
      echo "<script>alert('keranjang kosong, silahkan belanja dulu'); </script>";
      echo "<script>location='index.php';</script>";



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
            <h2>CV Pusat E-Teknologi</h2>          
            </div>
          </div>
        </div>
 </section>



<!-- navigasi -->
<section class=" posisi">
  <div class="topnav container">
  <a href="index.php">Home</a>
  <a href="daftar_produk.php">Daftar Produk</a>
  <a href="kontak.php">Contact</a>
  <a href="join.php">Join</a>
  <a href="log.php">Login</a>
</div>
</section>



<!-- search -->
<section >

<form action="" method="post">
<div class="row container pos_search">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        
        <button class="btn btn-default" type="submit" name="cari"> Cari</button>
      </span>
      <input type="text" name="keyword" autofocus class="form-control" placeholder="masukan keyword pencarian.." autocomplete="off">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
 </div>
 </form>



  <!-- keranjang -->
<section class="keranjang" >  
  <div class=" container pos_keranjang">
    <a href="log.php"><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>



<!-- isi dari keranjang -->

<br><br><br><br><br>
<section class="konten">
  <div class="container">
    <h1>Keranjang Belanja</h1>
    <hr>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Produk</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>  
      <?php foreach ($_SESSION["keranjang"] as $id_newproduk => $jumlah): ?>

        <?php 


            $ambil = $conn-> query("SELECT * FROM produk_baru WHERE id_newproduk='$id_newproduk' ");

            $pecah = $ambil -> fetch_assoc();
            $subharga = $pecah ["harga_newproduk"]*$jumlah;

            
        ?>
        
      <tbody>
        <tr>
          <td><?= $i; ?></td>
          <td><?php echo $pecah["kd_newproduk"]?></td>
          <td><?php echo $pecah["nama_newproduk"]?></td>
          <td><?php echo $pecah["harga_newproduk"]?></td>
          <td><?php echo $jumlah ?></td>
          
          <td>
            <a href="hapus_keranjang.php?id=<?php echo $id_newproduk; ?>" class="btn btn-danger btn-xs">Hapus</a>
          </td>
        <tr>

      <?php $i++; ?>
      <?php endforeach ?>   
      </tbody>
    </table>
    <a href="index.php" class="btn btn-default" >Kembali</a>
    <a href="chekout.php" class="btn btn-primary" > Checkout</a>



  </div>
</section>










    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>

     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>





<footer style=" background-color: #005990;  text-align: center;
     margin-top: 20%; 
      padding: 53px; 
     ">
  <div class="rounded-social-buttons">
                    <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
</footer>
<footer class="ftr" style="background-color: #005990; margin-top: -0%; height: 50px;">Copyright  © 2018 CV Pusat E-Electronik All Right reserved</footer>




  </body>
</html>