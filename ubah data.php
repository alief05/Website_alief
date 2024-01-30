<?php 

//con
require 'functions.php';

//ambil data di URL

$id_produk = $_GET ["id_produk"];

//query data mahasiswa berdasarkan id
$prd = query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];



//cek tombol submit

if ( isset($_POST["submit"])) {

//cek data sudah masuk / belum
if ( ubah($_POST) > 0){

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




  <!-- keranjang -->
<section class="keranjang" >  
  <div class=" container pos_keranjang">
    <a href=""><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>


<p>ubah data mahasiswa</p>


<br><br><br>
<a href="index.php"><button>INDEX</button></a>
  <!-- login admin -->

  <section class="ket_login">
  <h1 style="text-align: center; margin-top: 50px;">ADMIN</h1><hr style=" width:30%;">  
   <div class="container login_tam" style="">  
    <table> 
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

        	<input type="hidden" name="id_produk" value="<?= $prd["id_produk"]; ?>">
		<input type="hidden" name="fotoLama" value="<?= $prd["foto"]; ?>"> <!-- ubah data-->


        <div class="form-group">
          <label for="kd_produk" class="col-sm-2 control-label">Kode Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="kd_produk" id="kd_produk" value="<?= $prd["kd_produk"];?>"> 
          </div>
        </div>

        <div class="form-group">
          <label for="nama_produk" class="col-sm-2 control-label">Nama Produk</label>
          <div class="col-sm-10">
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?= $prd["nama_produk"];  ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $prd["harga_produk"];?>">
          </div>
        </div>
        
        <div class="form-group">
          <label for="foto" class="col-sm-2 control-label">Foto</label>
          <img src="img/<?= $prd['foto']; ?>" width="60" style="margin-left: 15px;"><br>
          <div class="col-sm-10">

            <input type="file" class="form-control" id="foto" name="foto" style="width: 25%; position: absolute; left: 21.8%;">
          </div>
        </div>
        
        <div class="form-group"><br>
          <label for="harga_produk" class="col-sm-2 control-label">Harga</label>
          <div class="col-sm-10">
            <input type="harga_produk" class="form-control" id="harga_produk"  name="harga_produk" value="<?= $prd["harga_produk"];?>">
          </div>
        </div>


        <br><br>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger" id="submit" name="submit">Ubah</button>
          </div>
        </div>

      </form>
    </table>
  </div>
</section>




</body>
</html>