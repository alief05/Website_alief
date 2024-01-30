<?php

require 'functions.php';

$id_produk = $_GET["id_produk"];

if ( hapus($id_produk) > 0){
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