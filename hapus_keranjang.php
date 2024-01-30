<?php

session_start();


require 'functions.php';

$id_newproduk = $_GET["id"];

unset ($_SESSION["keranjang"][$id_newproduk]);


echo "<script>alert('produk di hapus dari keranjang')</script>";

echo "<script>location='keranjang.php'</script>";







?>