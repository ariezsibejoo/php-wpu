<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM wisata
				WHERE 
				nama LIKE '%$keyword%' OR
				alamat LIKE '%$keyword%'
			";
$wisatas = query($query);
?>

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