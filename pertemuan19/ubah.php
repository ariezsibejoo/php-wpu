<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan ID
// [0] array multi dimensi cek view page source
$wisata = query("SELECT * FROM wisata WHERE id=$id")[0];

// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
// var_dump($_POST);

	

	

	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>
		";
	} ELSE { 
		echo "
		<script>
				alert('data gagal ditambahkan/sama');
				document.location.href = 'index.php';
			</script>
		";
	//menampilkan pesan kesalahan 
	// echo ("Error description: " . $conn -> error);
	}

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Ubah data wisata</title>
</head>
<body>
	<h1>Ubah data wisata</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $wisata["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $wisata["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $wisata["nama"]; ?>">
				<!-- required untuk fill yang harus diisi/tidka boleh kososng -->
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" value="<?= $wisata["alamat"]; ?>">
			</li>
			<li>
				<label for="operasional">Jam Operasional :</label>
				<input type="text" name="operasional" id="operasional" value="<?= $wisata["operasional"]; ?>">
			</li>
			<li>
				<label for="htm">HTM :</label>
				<input type="text" name="htm" id="htm" value="<?= $wisata["htm"]; ?>">
			</li>
			<li>
				<label for="deskripsi">Deskripsi :</label>
				<input type="text" name="deskripsi" id="deskripsi" value="<?= $wisata["deskripsi"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label><br>
				<img src="img/<?= $wisata["gambar"]; ?>" width="40"><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>
		</ul>


	</form>





</body>
</html>