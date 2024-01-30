
<?php
// koneksi ke dtbs

require('functions.php');



//ambil data

 $produk_baru = query(" SELECT nama_newproduk,harga_newproduk,foto,id_newproduk FROM produk_baru WHERE tanggal ='2018-07-18' ");

//query cari

 //tombol cari

if ( isset($_POST["cari"])){
    $produk_baru = cari($_POST["keyword"]);



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

<!--<br><br><br><br><br>
<pre><?php// print_r($produk_baru)?></pre>

<!-- Carousel / slide img-->

<section class="slide_img">
  <div class="container" style="  background-color: #f3f3f3;" >
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 10%;  background-color: white; ">
      <!-- Indicators  -->
      <ol class="carousel-indicators" >
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>

      <!-- memanggil fungsi slide gambar pada boostrap -->
    <div class="carousel-inner" >
        <div class="item active" >
          <img src="img/robotik1.jpg" alt="Los Angeles" style="width:100%; ">
        </div>
        <div class="item">
          <img src="img/robotik_garansi.jpg" alt="Chicago" style="width:100%;">
        </div>
        <div class="item">
          <img src="img/robotik_murah5.jpg" alt="New york" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#carouselExampleIndicators" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carouselExampleIndicators" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>


<section class="produk_new container">
  <div class="produk_new_1">
    
    <h1 style="text-align: center; margin-top: 50px;">Daftar Produk Baru</h1><hr style=" width:30%;"> 
    

      <div class="row">
                
              <?php foreach ( $produk_baru as $row ) : ?>
                <div class="col-md-3">
                  <div class="thumbnail">
                    <img src="img/<?php echo $row['foto'];?>">
                      <div class="caption">
                        <h3><?php echo $row['nama_newproduk'];?></h3>
                          <h5><?php echo number_format( $row["harga_newproduk"]);?></h5>
                            <a href="beli.php?id_newproduk=<?= $row['id_newproduk']; ?>" class="btn btn-primary">Beli</a>
                      </div>
                  </div>
                </div>     
                <?php endforeach;?>

        
      </div>
  </div>
</section>

<section class="ket_index container">
  <div class="ket">
    <div class="row style_fot" style=" position: relative; margin-top: 14%; color: white;">
    
                <div class="col-md-4">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-4">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <div class="col-md-4">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                

                  </div>
                </div>     


        
      </div>
  </div>
</section>





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
    <a href="keranjang.php"><img src="img/keranjang3.png" width="50"></a>
  </div>
</section>








<!-- login -->



<!--Content -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src="js/config.json"></script>


<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>


<footer class="ftr" style="background-color: #00bce7; height: 200px; margin-top: -230px;"> </footer>



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