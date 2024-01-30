<?php

//con
$conn = mysqli_connect("localhost","data","","cv_pusat_e_teknologi");


//menangkap quey dari index.php


function query ($query){
	global $conn;

	$result = mysqli_query($conn,$query);
	$rows = [];

	while ( $row = mysqli_fetch_assoc($result))
			
			{
				$rows[] = $row;
			}
				return $rows;
			}









//tambah data_______________________________________________________________________________________________________________________________
function tambah($data){
	global $conn;

	$kd_produk 		= htmlspecialchars($data["kd_produk"]);
	$nama_produk 	= htmlspecialchars($data["nama_produk"]);
	$deskripsi 		= htmlspecialchars($data["deskripsi"]);
	$harga_produk 	= htmlspecialchars($data["harga_produk"]);
	


	
///upload gambar............
	$foto = upload();
	if ( !$foto ){
		return false;
	}



//query inset data..........
		$query = "INSERT INTO produk 
					VALUES
					('','$kd_produk','$nama_produk','$deskripsi','$foto','$harga_produk')

				";

		 mysqli_query($conn, $query);

		 return mysqli_affected_rows($conn); 


		} 



//ambil data.......... 
		function upload(){

			$namaFile = $_FILES['foto']['name'];
			$ukuranFile = $_FILES['foto']['size'];
			$error = $_FILES['foto']['error'];
			$tmpName = $_FILES['foto']['tmp_name'];



// cek apakah tidak ada gambar yang diupload..........

	if( $error === 4){
		echo "
				<script>
					alert('pilih foto terlebih dahulu!');

				</script>;

		";

			return false;
	}



//cek apakah yang diupload adalah gambar..........

	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));

		if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
					echo "				
				<script>
					alert('yang anda upload bukan foto!');

				</script>;";

			return false;

		}

//cek jika ukurannya besar..........

		if($ukuranFile > 1000000){
					echo "				
				<script>
					alert('ukuran foto terlalu besar!');

				</script>;";

			return false;


		}
			
//lolos pengecekan, gambar siap diupload..........
//generate nama gambar baru..........
		$namaFileBaru	 = uniqid();
		$namaFileBaru	.=	'.';
		$namaFileBaru	.= 	$ekstensiFoto;





		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;

}












//tambah data pelanggan_______________________________________________________________________________________________________________________________
function daftar_pelanggan($pelanggan){
	global $conn;

	$nama_pelanggan = htmlspecialchars($pelanggan["nama_pelanggan"]);
	$email 			= htmlspecialchars($pelanggan["email"]);
	$telepon 		= htmlspecialchars($pelanggan["telepon"]);
	$alamat 		= htmlspecialchars($pelanggan["alamat"]);
	$user			= htmlspecialchars($pelanggan["user"]);
	$password		= htmlspecialchars($pelanggan["password"]);
	

	
///upload gambar............
	
	///upload gambar............
	$foto = upload_img();
	if ( !$foto ){
		return false;
	}







//query inset data..........
		$query = "INSERT INTO pelanggan 
					VALUES
					('','$nama_pelanggan','$email','$telepon','$alamat','$foto','$user','$password')

				";

		 mysqli_query($conn, $query);

		 return mysqli_affected_rows($conn); 


		} 


//ambil data.......... 
		function upload_img(){

			$namaFile = $_FILES['foto']['name'];
			$ukuranFile = $_FILES['foto']['size'];
			$error = $_FILES['foto']['error'];
			$tmpName = $_FILES['foto']['tmp_name'];




// cek apakah tidak ada gambar yang diupload..........

	if( $error === 4){
		echo "
				<script>
					alert('pilih foto terlebih dahulu!');

				</script>;

		";

			return false;
	}



//cek apakah yang diupload adalah gambar..........

	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));

		if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
					echo "				
				<script>
					alert('yang anda upload bukan foto!');

				</script>;";

			return false;

		}

//cek jika ukurannya besar..........

		if($ukuranFile > 1000000){
					echo "				
				<script>
					alert('ukuran foto terlalu besar!');

				</script>;";

			return false;


		}
			
//lolos pengecekan, gambar siap diupload..........
//generate nama gambar baru..........
		$namaFileBaru	 = uniqid();
		$namaFileBaru	.=	'.';
		$namaFileBaru	.= 	$ekstensiFoto;





		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;

}




//tambah prodak baru__________________________________________________________________________________________________________________
function tambah_new($newprodak){
	global $conn;

	$kd_newproduk 		= htmlspecialchars($newprodak["kd_newproduk"]);
	$nama_newproduk 	= htmlspecialchars($newprodak["nama_newproduk"]);
	$deskripsi 		= htmlspecialchars($newprodak["deskripsi"]);
	$harga_newproduk 	= htmlspecialchars($newprodak["harga_newproduk"]);
	$berat 	= htmlspecialchars($newprodak["berat"]);
		$tanggal 	= htmlspecialchars($newprodak["tanggal"]);
	


	
///upload gambar............
	$foto = upload_newprd();
	if ( !$foto ){
		return false;
	}



//query inset data..........
		$query = "INSERT INTO produk_baru 
					VALUES
					('','$kd_newproduk','$nama_newproduk','$deskripsi','$foto','$harga_newproduk','$berat','tanggal')

				";

		 mysqli_query($conn, $query);

		 return mysqli_affected_rows($conn); 


		} 



//ambil data.......... 
		function upload_newprd(){

			$namaFile = $_FILES['foto']['name'];
			$ukuranFile = $_FILES['foto']['size'];
			$error = $_FILES['foto']['error'];
			$tmpName = $_FILES['foto']['tmp_name'];



// cek apakah tidak ada gambar yang diupload..........

	if( $error === 4){
		echo "
				<script>
					alert('pilih foto terlebih dahulu!');

				</script>;

		";

			return false;
	}



//cek apakah yang diupload adalah gambar..........

	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));

		if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
					echo "				
				<script>
					alert('yang anda upload bukan foto!');

				</script>;";

			return false;

		}

//cek jika ukurannya besar..........

		if($ukuranFile > 1000000){
					echo "				
				<script>
					alert('ukuran foto terlalu besar!');

				</script>;";

			return false;


		}
			
//lolos pengecekan, gambar siap diupload..........
//generate nama gambar baru..........
		$namaFileBaru	 = uniqid();
		$namaFileBaru	.=	'.';
		$namaFileBaru	.= 	$ekstensiFoto;





		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;

}














//tambah data______________________________________________________________________________________
function tambah_foto($data){
	global $conn;

	$tanggal 		= htmlspecialchars($data["tanggal"]);
	

	///upload gambar
	$gambar = upload_foto();
	if ( !$gambar ){
		return false;





	}



	//query inset data
$query = "INSERT INTO foto_transaksi 
			VALUES
			('','$gambar','$tanggal')

		";

 mysqli_query($conn, $query);

 return mysqli_affected_rows($conn); 

} 








//ambil data___________________________________________________________________________________________ 
function upload_foto(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload

	if( $error === 4){
		echo "
				<script>
					alert('pilih gambar terlebih dahulu!');

				</script>;

		";

			return false;
	}


//cek apakah yang diupload adalah gambar

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
					echo "				
				<script>
					alert('yang anda upload bukan gambar!');

				</script>;";

			return false;

		}

		//cek jika ukurannya besar

		if($ukuranFile > 1000000){
					echo "				
				<script>
					alert('ukuran gambar terlalu besar!');

				</script>;";

			return false;


		}
			
//lolos pengecekan, gambar siap diupload
//generate nama gambar baru
$namaFileBaru	 = uniqid();
$namaFileBaru	.=	'.';
$namaFileBaru	.= 	$ekstensiGambar;





		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;


}





















//hapus____________________________________________________________________________________________________________________________


function hapus ($id_produk) {
		global $conn;


		mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");

		return mysqli_affected_rows($conn);

}


//hapus pelanggan______________________________________________________________________________________________________________________


function hapus_pelanggan ($id_pelanggan) {
		global $conn;


		mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan");

		return mysqli_affected_rows($conn);

}



//hapus newproduk______________________________________________________________________________________________________________________


function hapus_newproduk ($id_newproduk) {
		global $conn;


		mysqli_query($conn, "DELETE FROM produk_baru WHERE id_newproduk = $id_newproduk");

		return mysqli_affected_rows($conn);

}
























//ubah_prodak__________________________________________________________________________
function ubah_pelanggan ($data){
		global $conn;
		
	$id_pelanggan 		= $data["id_pelanggan"];
	$nama_pelanggan 		= htmlspecialchars($data["nama_pelanggan"]);
	$email 		= htmlspecialchars($data["email"]);
	$telepon 		= htmlspecialchars($data["telepon"]);
	$alamat 	= htmlspecialchars($data["alamat"]);
	$level = htmlspecialchars($data["level"]);
	$password = htmlspecialchars($data["password"]);




	//ubah data
	//cek apakah user pilih gambar baru atau tidak

	if($_FILES['foto']['error'] === 4){
		$foto = $fotoLama;
	} else {


	$foto 	= upload();


	}






	//query inset data
$query = "UPDATE pelanggan SET 
			id_pelanggan 	= '$id_pelanggan',
			nama_pelanggan 	= '$nama_pelanggan',
			email 		= '$email',
			telepon = '$telepon',
			alamat = '$alamat',
			foto 	= '$foto',
			level = '$level',
			password = '$password'
		 WHERE id_pelanggan = $id_pelanggan

			
		";

 mysqli_query($conn, $query);

 return mysqli_affected_rows($conn); 


}











//ubah new produk__________________________________________________________________________________
	function ubah_newprd($newprodak){
	global $conn;
	
	$id_newproduk 		= $newprodak["id_newproduk"];
	$kd_newproduk 		= htmlspecialchars($newprodak["kd_newproduk"]);
	$nama_newproduk 	= htmlspecialchars($newprodak["nama_newproduk"]);
	$deskripsi 			= htmlspecialchars($newprodak["deskripsi"]);
	$fotoLama 			= htmlspecialchars($newprodak["fotoLama"]);
	$harga_newproduk 	= htmlspecialchars($newprodak["harga_newproduk"]);




	//ubah data
	//cek apakah user pilih gambar baru atau tidak

	if($_FILES['foto']['error'] === 4){
		$foto = $fotoLama;
	} else {


	$foto 	= upload_newprd();


	}


	//query inset data
$query = "UPDATE produk_baru SET 
			kd_newproduk 	= '$kd_newproduk',
			nama_newproduk 	= '$nama_newproduk',
			deskripsi 		= '$deskripsi',
			foto 			= '$foto',
			harga_newproduk = '$harga_newproduk'
		 WHERE id_newproduk = $id_newproduk

			
		";

 mysqli_query($conn, $query);

 return mysqli_affected_rows($conn); 


}











//cari produk

function cari ($keyword){
	$query = "SELECT * FROM produk_baru
				WHERE 
				nama_newproduk LIKE '%$keyword%' OR
				kd_newproduk LIKE '%$keyword%' OR
				deskripsi LIKE '%$keyword%' 
	";

	return query($query);


}



//cari pelanggan

function cari_pelanggan ($keyword){
	$query = "SELECT * FROM pelanggan
				WHERE 
				nama_pelanggan LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				telepon LIKE '%$keyword%' 
	";

	return query($query);


}


function cari_pembelian ($keyword){
	$query = "SELECT * FROM pembelian
				WHERE 
				tanggal_pembelian LIKE '%$keyword%' OR
				total_pembelian LIKE '%$keyword%' 
	";

	return query($query);


}








?>