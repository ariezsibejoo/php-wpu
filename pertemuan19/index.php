<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$wisatas = query("SELECT * FROM wisata");

// TOMBOL CARI DITEKAN
if( isset($_POST["cari"]) ) {
	$wisatas = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Wisata</h1>

<a href="tambah.php">Tambah data wisata</a>
<br><br>
<!-- SEARCH -->
<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">Cari</button>

</form>
<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
	
<tr>
	<th>No.</th>
	<th>Aksi</th>
	<th>Gambar</th>
	<th>Nama</th>
	<th>Alamat</th>
	<th>Jam Operasional</th>
	<th>HTM</th>
	<th>Deskripsi</th>

</tr>
	<?php $i=1; ?>
	<?php foreach( $wisatas as $wisata ) : ?>
	<tr>
		<td><?= $i;  ?></td>
		<td>
			<a href="ubah.php?id=<?= $wisata["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $wisata["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');">Hapus</a>
		</td>
		<td><img src="img/<?= $wisata["gambar"]; ?>" width="50"></td>
		<td><?= $wisata["nama"]; ?></td>
		<td><?= $wisata["alamat"]; ?></td>
		<td><?= $wisata["operasional"]; ?> </td>
		<td><?= $wisata["htm"]; ?></td>
		<td><?= $wisata["deskripsi"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>
<script src="js/script.js"></script>
</body>
</html>