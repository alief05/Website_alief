<?php 

//con
require 'functions.php';

//ambil data di URL

$id_pelanggan = $_GET ["id_pelanggan"];

//query data mahasiswa berdasarkan id
$pelanggan = query("SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan")[0];



//cek tombol submit

if ( isset($_POST["submit"])) {

//cek data sudah masuk / belum
if ( ubah_pelanggan($_POST) > 0){

	 echo "

	 <script> 
			 alert('data berhasil diubah');	
			 document.location.href = 'pelanggan.php'; 
	 </script>

	 ";

}else {

	echo "

	 <script> 
			 alert('data gagal diubah');	
			 document.location.href = 'pelanggan.php'; 
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

<h1 style="text-align: center; margin-top: 100px;">Ubah Pelanggan</h1><hr style=" width:30%;"> 
    



<br>


<form action="" method="post" enctype="multipart/form-data" style="margin-left: 35%;">

	<input type="hidden" name="id_pelanggan" value="<?= $pelanggan["id_pelanggan"]; ?>">

		<input type="hidden" name="fotoLama" value="<?= $pelanggan["foto"]; ?>"> <!-- ubah data-->

		<tr>
			<label for="nama_pelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>
			<input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?= $pelanggan["nama_pelanggan"]; ?>"></input>
		</tr>

		<br>

		<tr>
			<label for="email" class="col-sm-2 control-label">Email</label>
			<input type="text" name="email" id="email" value="<?= $pelanggan["email"]; ?>"></input>
		</tr>

		<br>

		<tr>
			<label for="telepon" class="col-sm-2 control-label">Telepon</label>			
			<input type="text" name="telepon" id="telepon" value="<?= $pelanggan["telepon"]; ?>"></input>
		</tr>

		<br>

		<tr>
			<label for="alamat" class="col-sm-2 control-label">Alamat</label>			
			<input type="text" name="alamat" id="alamat" value="<?= $pelanggan["alamat"]; ?>"></input>
		</tr>

		<br>

		<tr>
			<label for="foto" class="col-sm-2 control-label">Gambar</label><br>
			<img src="img/<?= $pelanggan['foto']; ?>" width="150"><br><!-- ubah data-->
			<input type="file" name="foto" id="foto" style="margin-left: 147px;"></input><!-- ubah data-->
		</tr>

		<br>

		<tr>
			<label for="level" class="col-sm-2 control-label"></label>
			<input type="hidden" name="level" id="level" value="<?= $pelanggan["level"]; ?>"></input>
		</tr>

		<br>

		<tr>
			<label for="password" class="col-sm-2 control-label"></label>
			<input type="hidden" name="password" id="password" value="<?= $pelanggan["password"]; ?>" ></input>
		</tr>

		<tr>
			<button type="submit" name="submit" id="submit" >Ubah Data</button>
		</tr>



	</ul>




</form>





</body>
</html>