<?php

require 'functions.php';

$id_pelanggan = $_GET["id_pelanggan"];

if ( hapus_pelanggan($id_pelanggan) > 0){
	 echo "

	 <script> 
			 alert('data berhasil hapus');	
			 document.location.href = 'pelanggan.php'; 
	 </script>

	 ";

} else {

	echo "

	 <script> 
			 alert('data berhasil ditambahkan');	
			 document.location.href = 'pelanggan.php'; 
	 </script>	

	 ";
	}









?>