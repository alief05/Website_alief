<?php 

//con
require 'functions.php';



//cek tombol submit

if ( isset($_POST["submit"])) {


//cek data sudah masuk / belum
if ( tambah_new($_POST) > 0){

	 echo "

	 <script> 
			 alert('data berhasil ditambahkan');	
			 document.location.href = 'produk.php'; 
	 </script>

	 ";

}else {

	echo "

	 <script> 
			 alert('data gagal ditambahkan');	
			 document.location.href = 'produk.php'; 
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
    <a href=""><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>



<br><br><br>
<a href="index.php"><button>INDEX</button></a>
  <!-- login admin -->

  <section class="ket_login">
  <h1 style="text-align: center; margin-top: 50px;">Tambah New Produk</h1><hr style=" width:30%;">  
   <div class="container login_tam" style="">  
    <table> 
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="kd_newproduk" class="col-sm-2 control-label">Kode Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="kd_newproduk" id="kd_newproduk" placeholder="masukan kode...">
          </div>
        </div>

        <div class="form-group">
          <label for="nama_newproduk" class="col-sm-2 control-label">Nama Produk</label>
          <div class="col-sm-10">
            <input type="text" name="nama_newproduk" class="form-control" id="nama_newproduk" placeholder="nama produk...">
          </div>
        </div>

        <div class="form-group">
          <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi...">
          </div>
        </div>
        
        <div class="form-group">
          <label for="foto" class="col-sm-2 control-label">Foto</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="foto" name="foto" placeholder="foto...">
          </div>
        </div>
        
        <div class="form-group">
          <label for="harga_newproduk" class="col-sm-2 control-label">Harga</label>
          <div class="col-sm-10">
            <input type="harga_newproduk" class="form-control" id="harga_newproduk" placeholder="harga..." name="harga_newproduk">
          </div>
        </div>

        <div class="form-group">
          <label for="berat" class="col-sm-2 control-label">Berat</label>
          <div class="col-sm-10">
            <input type="berat" class="form-control" id="berat" placeholder="berat..." name="berat">
          </div>
        </div>


        <div class="form-group">
          <label for="tanggal" class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="tanggal" placeholder="berat..." name="tanggal">
          </div>
        </div>



        <br><br>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger" id="submit" name="submit"><a href="logout.php">Tambah</a></button>
          </div>
        </div>

      </form>
    </table>
  </div>
</section>

</body>
</html>