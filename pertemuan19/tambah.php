<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
	

	

	// cek apakah data berhasil ditambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} ELSE {
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
<html>
<head>
	<title>Tambah data wisata</title>
</head>
<body>
	<h1>Tambah data wisata</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required>
				<!-- required untuk fill yang harus diisi/tidka boleh kososng -->
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat">
			</li>
			<li>
				<label for="operasional">Jam Operasional :</label>
				<input type="text" name="operasional" id="operasional">
			</li>
			<li>
				<label for="htm">HTM :</label>
				<input type="text" name="htm" id="htm">
			</li>
			<li>
				<label for="deskripsi">Deskripsi :</label>
				<input type="text" name="deskripsi" id="deskripsi">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
		</ul>


	</form>





</body>
</html>