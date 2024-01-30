<?php


session_start();

//con
require 'functions.php';




if (!isset($_SESSION["login"])){
      header("Location: log.php");
      exit;



}

    


 $ambil_prd = $conn->query("SELECT * FROM pembelian_newproduk WHERE id_pembelian='$_GET[id]'");
 $detail = $ambil_prd -> fetch_assoc();


 $ambil_prduk = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian ='$_GET[id]' "); 
 $deatas = $ambil_prduk -> fetch_assoc();




//cek tombol submit

if ( isset($_POST["submit"])) {




//cek data sudah masuk / belum
if ( tambah_foto($_POST) > 0){

   echo "

   <script> 
       alert('Terimakasih sudah berbelanja ');  
       document.location.href = 'logout.php'; 
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


    <style type="text/css">
      


      table, td, th {
   
}

table {
    border-collapse: collapse;
    width: 10%;
}

th {
    text-align: left;
}


td {

      padding: 10px;

}
    </style>




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
        
        <button class="btn btn-default" type="submit" name="cari_pembeli"> Cari</button>
      </span>
      <input type="text" name="keyword" autofocus class="form-control" placeholder="masukan keyword pencarian.." autocomplete="off">
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



    <h1 style="text-align: center; margin-top: 100px;">NOTA</h1><hr style=" width:30%;"> 
    




      






<br>
<!-- produk terbaru -->
<section class="produk_new container">
  <div class="produk_new_1">
    

<table class="table-striped" >
      <tr>
        <td>Tanggal Pembelian</td>
        <td> : </td>
        <td><?php echo $deatas['tanggal_pembelian']?></td>
       
      </tr>

      <tr>
        <td>Nama</td>
        <td> : </td>
        <td><?php echo $deatas['nama_pelanggan']?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $deatas['alamat']?></td>
      </tr>
      <tr>
        <td>Telepon</td>
        <td>:</td>
        <td><?php echo $deatas['telepon']?></td>
    </tr>
</table>
 <hr>

<section class="ket_pembelian">
      <div class="container">
 
        <table border="1" cellpadding="10" cellspacing="0" class="table table-striped" style="margin-left: -1.3%;" >  
          <thead>
            <tr class="danger">
              <td>NO</td>
              <td>Nama Produk</td>
              <td>Berat</td>
              <td>Harga Produk</td>
              <td>Jumlah</td> 
              <td>Total Berat</td>
              <td>Total</td>
            </tr>
          </thead>
       <tbody>   
        <?php $nomor = 1; ?>

          <?php $ambil_prd = $conn->query("SELECT * FROM pembelian_newproduk WHERE id_pembelian='$_GET[id]' "); ?>

            <?php  while($detailis = $ambil_prd -> fetch_assoc()){?>
              <tr>
                <td><?= $nomor; ?></td>
                <td><?php  echo $detailis['nama']; ?></td>
                <td><?php echo number_format($detailis['berat']);?>.Gr</td>
                <td><p>Rp.<?php echo number_format($detailis['harga']); ?></p></td>
                <td><?php echo $detailis['jumlah']; ?></td>
                <td><p><?php echo number_format ($detailis['subberat']); ?> .Gr</p></td>
                <td><p>Rp.<?php echo number_format ($detailis['subharga']); ?> </p></td>
              </tr> 
            <?php $nomor++; ?>
          <?php }?>  
        </tbody>
          </table>           
      </div>
</section>

  
      <div class="alert alert-info" style="text-align: center;">
          <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian ='$_GET[id]' "); ?>
                       <?php while($pecah = $ambil->fetch_assoc()){?>

                        <p>Pembayaran Anda sudah termasuk Ongkir : Rp.<?php echo number_format($pecah['total_pembelian']); ?></p>
                        <p>Silahkan Transfer ke No Rekening ini : 037450973495 </p> <p> Kirim segera Foto Struk Tanda Bukti Pembayaran Anda.</p>
                        <?php }?>
                        <br>
                        <form action="" method="post" enctype="multipart/form-data"><!-- tambah data img-->
                            <ul>
                                <input type="file" name="gambar" id="gambar" style="margin-left: 35.5%;" class="btn btn-danger" required></input>
                              <br>
                                <input type="hidden" name="tanggal" id="tanggal" ></input>
                                <button href="logout.php" class="btn btn-primary" type="submit" name="submit" id="submit" style="margin-left: -3.5%;" >Lanjutkan</button>
                            </ul>
                          </form>

      </div>
    </div>
  </div>







          




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

<footer style=" background-color: #005990;  text-align: center;
    width: 120.2%; margin-left: -11.0%; 
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
<footer class="ftr" style="background-color: #005990; margin-top: -0%;width: 118.4%; margin-left: -9.2%;  height: 50px;">Copyright  © 2018 CV Pusat E-Electronik All Right reserved</footer>










  </body>
</html>


