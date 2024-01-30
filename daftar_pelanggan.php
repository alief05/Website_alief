<?php 

//con
require 'functions.php';



//cek tombol submit

if ( isset($_POST["submit"])) {






//cek data sudah masuk / belum
if ( daftar_pelanggan($_POST) > 0){

   echo "

   <script> 
       alert('data berhasil ditambahkan');  
       document.location.href = 'index.php'; 
   </script>

   ";

}else {

  echo "

   <script> 
       alert('data gagal ditambahkan'); 
       document.location.href = 'index.php'; 
   </script>  

   ";
  }
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
  <a href="daftar_pelanggan.php">Join</a>
</div>
</section>


<!-- search -->
<section >
<div class="row container pos_search">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search for...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  </div>



  <!-- keranjang -->
<section class="keranjang" >  
  <div class=" container pos_keranjang">
    <a href=""><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>
<br><br>


<section class="ket_login">
  <h1 style="text-align: center; margin-top: 50px;">JOIN</h1><hr style=" width:30%;">  

<a href="admin.php" style="margin-left: 5%"><button>admin tombol sementara</button></a>
   <div class="container login_tam" style="">  

<form action="" method="post" enctype="multipart/form-data"><!-- tambah data img-->

  <div class="form-group">
    <label for="nama_pelanggan">Nama</label>
    <input type="text" class="form-control" id="nama_pelanggan" placeholder="nama..." name="nama_pelanggan">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" placeholder="email.." name="email">
  </div>


  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" placeholder="alamat..." name="alamat">
  </div>


  <div class="form-group">
    <label for="Telepon">Telepon</label>
    <input type="text" class="form-control" id="telepon" placeholder="Telepon.." name="telepon">
  </div>


  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" id="foto" name="foto">
  </div>


  <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>
</form>


<!-- login -->



<!--Content -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>






  </body>
</html>