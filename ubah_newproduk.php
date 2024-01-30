<?php 

//con
require 'functions.php';

//ambil data di URL

$id_newproduk = $_GET ["id_newproduk"];

//query data mahasiswa berdasarkan id
$new_produk = query("SELECT * FROM produk_baru WHERE id_newproduk = $id_newproduk")[0];



//cek tombol submit

if ( isset($_POST["submit"])) {

//cek data sudah masuk / belum
if ( ubah_newprd($_POST) > 0){

   echo "

   <script> 
       alert('data berhasil diubah'); 
       document.location.href = 'produk.php'; 
   </script>

   ";

}else {

  echo "

   <script> 
       alert('data gagal diubah');  
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


    <style type="text/css">


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

<h1 style="text-align: center; margin-top: 100px;">Ubah Produk</h1><hr style=" width:30%;"> 
    



<br>

<div class="form" style="margin-left: 35%;">
<form action="" method="post" enctype="multipart/form-data" class="img-rounded">

  <input type="hidden"  name="id_newproduk" value="<?= $new_produk["id_newproduk"]; ?>">

    <input type="hidden" name="fotoLama" value="<?= $new_produk["foto"]; ?>"> <!-- ubah data-->

  <ul>
    <tr >
      <label  for="kd_newproduk" class="col-sm-2 control-label">Kode_NewProduk</label>
      <input type="text" name="kd_newproduk" id="kd_newproduk" value="<?= $new_produk["kd_newproduk"]; ?>"></input>
    </tr>
    
    <br>
    
    <tr>
      <label for="nama_newproduk" class="col-sm-2 control-label">Nama</label>
      <input type="text" name="nama_newproduk" id="nama_newproduk" value="<?= $new_produk["nama_newproduk"]; ?>"></input>
    </tr>
    
    <br>

    <tr>
      <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
      <input type="text" name="deskripsi" id="deskripsi" value="<?= $new_produk["deskripsi"]; ?>"></input>
    </tr>

    <br>

    <tr>
      <label for="harga_newproduk" class="col-sm-2 control-label">Harga</label>
      <input type="text" name="harga_newproduk" id="harga_newproduk" value="<?= $new_produk["harga_newproduk"]; ?>"></input>
    </tr>

    <br>

    <tr>
      <label for="foto" class="col-sm-2 control-label">Gambar</label><br>

      
      <img src="img/<?= $new_produk['foto']; ?>" width="150"><br><!-- ubah data-->
      <br>
      <input type="file" name="foto" id="foto" style="margin-left: 16.5%;" ></input><!-- ubah data-->
    </tr>
    <br>
    <tr>
      <button type="submit" name="submit" id="submit"  >Ubah Data</button>
    </tr>
</div>


  </ul>




</form>


</body>
</html>