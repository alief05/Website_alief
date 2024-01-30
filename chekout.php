<?php


session_start();

if (!isset($_SESSION["login"])){
      header("Location: log.php");
      exit;



}

    $conn = mysqli_connect("localhost","root","","cv_pusat_e_teknologi");



    if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))

    {
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





<!-- isi dari keranjang -->

<br><br><br><br><br><br>
<section class="konten">
  <div class="container">
    <h1>Checkout</h1>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Harga Produk</th>
          <th>Nama Produk</th>
          <th>Jumlah Produk</th>
          <th>Sub Harga</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php $totalbelanja = 0;?>  
      <?php foreach ($_SESSION["keranjang"] as $id_newproduk => $jumlah): ?>

        <?php 
             $ambil = $conn -> query("SELECT * FROM produk_baru WHERE id_newproduk='$id_newproduk' ");



            $pecah = $ambil -> fetch_assoc();
            $subharga = $pecah ["harga_newproduk"]*$jumlah;

            
        ?>
        
      <tbody>
        <tr>
          <td><?= $i; ?></td>
          <td><?php echo $pecah["harga_newproduk"]?></td>
          <td><?php echo $pecah["nama_newproduk"]?></td>
          <td><?php echo $jumlah ?></td>
          <td><?php echo $pecah["harga_newproduk"]?></td>
          <td>
        
          </td>
        <tr>

      <?php $i++; ?>
      <?php $totalbelanja+=$subharga;?>
      <?php endforeach ?>   
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total Belanja  </th>
          <th>Rp. <?php echo number_format($totalbelanja)?>  </th>
        </tr>
       </tfoot>
    </table>

    <form method="post">
      

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
              <input type="text" readonly value="<?php echo $_SESSION["login"]['nama_pelanggan']?>" class="form-control">
            </div>
          </div> 
        <div class="col-md-4">
           <div class="form-group">
            <input type="text" readonly value="<?php echo $_SESSION["login"]['telepon']?>" class="form-control">
          </div>
        </div> 

        <div class="col-md-4" style="margin-top: -0.6%;">
          <select class="form-control" name="id_ongkir">
            <option>pilih ongkos kirim</option>
              <?php
                    $ambil_ongkir = $conn->query ("SELECT  * FROM ongkir");
                    while ($perongkir = $ambil_ongkir->fetch_assoc()){?>

                    <option value=<?php echo $perongkir['id_ongkir']?>>
                        <?php echo $perongkir['nama_kota']?>
                        <?php echo $perongkir['id_ongkir']?>
                        - Rp. <?php echo number_format($perongkir['tarif']) ?>
                    </option>

                  <?php } ?>
          </select>
      </div>
     </div> 

      <div>
        <label>Alamat Lengkap Pengiriman</label>
          <textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alama lengkap pengiriman "></textarea>
      </div>

      <button class="btn btn-primary" name="checkout" type="submit" > Lanjutkan</button>
      <!-- <input type="submit" class="btn btn-primary" name="checkout" value="Lanjutkan"> -->
    </form>
<br><br><br><br>
  
  <?php
        if (isset($_POST["checkout"]))
        {
           $id_pelanggan  = $_SESSION["login"]["id_pelanggan"];
           $id_ongkir     = $_POST["id_ongkir"];            
           // die($id_ongkir);
           $tanggal_pembelian = date("Y-m-d");
           $alamat_pengiriman = $_POST ['alamat_pengiriman'];



           $ambiler = $conn->query ("SELECT * FROM ongkir where id_ongkir = '$id_ongkir' ");
           $arrayongkir = $ambiler -> fetch_assoc();
           $tarif = $arrayongkir['tarif'];
           $nama_kota     = $arrayongkir['nama_kota'];
           $total_pembelian = $totalbelanja + $tarif;

           //menyimpan data ke data pembelian

           $conn->query ("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");
        

        //mendapatkan id pembelian barusan terjadi

          $id_pembelian_barusan =  $conn-> insert_id;

        foreach ($_SESSION["keranjang"] as $id_newproduk => $jumlah) 
         {

          //mendapatkan data produk berdasarkan id_produk

          $ambil = $conn -> query ("SELECT * FROM produk_baru WHERE id_newproduk = '$id_newproduk'");
          $perproduk = $ambil->fetch_assoc();

          $nama = $perproduk ['nama_newproduk'];
          $harga = $perproduk ['harga_newproduk'];
          $berat = $perproduk ['berat'];

          $harga_berat = $perproduk ['harga_berat'];
          
          $subberat = $perproduk['berat']*$jumlah;
          $subharga = $perproduk['harga_newproduk']*$jumlah;
          $subberat = $perproduk['berat']*$jumlah;
         

          
          $conn->query ("INSERT INTO pembelian_newproduk (id_pembelian,id_newproduk,jumlah,nama,harga,berat,subberat,subharga) VALUES ('$id_pembelian_barusan','$id_newproduk','$jumlah','$nama','$harga',$berat,'$subberat','$subharga')" ); 
          }


          //mengkosongkan keranjang
          unset($_SESSION["keranjang"]);

          //tampilkan dialihkan ke halaman nota
          echo "<script>alert('pembelian_sukses');</script>";
          echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

 }       
  ?>


  </div>
</section>


<!-- jumbotron/tampilan header -->
<section class="background_nav">
        <div class="jumbotron jumbotron-edit">  
          <div class="wlc container visible-xs-*">
            <h2>CV pusat E-Teknologi</h2>          
            </div>
          </div>
        </div>
 </section>



<!-- navigasi -->
<section class=" posisi">
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
    <a href="keranjang.php"><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

<footer style=" background-color: #005990;  text-align: center;
     margin-top: %; 
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