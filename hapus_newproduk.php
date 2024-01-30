<?php

require 'functions.php';

$id_newproduk = $_GET["id_newproduk"];

if ( hapus_newproduk($id_newproduk) > 0){
	 echo "

	 <script> 
			 alert('data berhasil hapus');	
			 document.location.href = 'produk.php'; 
	 </script>

	 ";

} else {

	echo "

	 <script> 
			 alert('data berhasil ditambahkan');	
			 document.location.href = 'produk.php'; 
	 </script>	

	 ";
	}









?>