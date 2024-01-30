<?php

session_start();

//mendapatkan id produk

$id_newproduk = $_GET ['id_newproduk'];


if (isset($_SESSION['keranjang'][$id_newproduk]))
	{
		$_SESSION['keranjang'][$id_newproduk]+=1;
	}


//

else
{

	$_SESSION['keranjang'][$id_newproduk] = 1;
}

echo "<script>alert('produk telah masuk');</script>";

echo "<script>location='keranjang.php';</script>";

?>