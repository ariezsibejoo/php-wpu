<?php 
// KONEKSI KE DATABASE
$conn = mysqli_connect("localhost", "root", "", "malang");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;
	// ambil data dari tiap elemen dalam form
	// html special chars untuk mengatasi sql injection
	$nama=htmlspecialchars($data["nama"]);
	$alamat=htmlspecialchars($data["alamat"]);
	$operasional=htmlspecialchars($data["operasional"]);
	$htm=htmlspecialchars($data["htm"]);
	$deskripsi=htmlspecialchars($data["deskripsi"]);

	// UPLOAD GAMBAR DULU
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	//QUERY INSERT DATA
	$query="INSERT INTO wisata
			VALUES
			('','$nama','$alamat','$operasional','$htm','$deskripsi','$gambar')
			";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);

}


function upload() {
	// CEK VIEW PAGE SOURCE DI $_FILES BERISI ARRAY BARU
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu');
				</script>";
		return false;

	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	// pisah nama file dan ekstensi kemudian ambil array terakhir
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Yang anda upload bukan gambar');
				</script>";
		return false;
	}


	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar');
				</script>";
		return false;
	}

	// jika lolos pengecekan, gambar siap diupload
	// generate nama baru untuk file
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;






	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM wisata WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;
	// ambil data dari tiap elemen dalam form
	// html special chars untuk mengatasi sql injection
	$id=$data["id"];
	$nama=htmlspecialchars($data["nama"]);
	$alamat=htmlspecialchars($data["alamat"]);
	$operasional=htmlspecialchars($data["operasional"]);
	$htm=htmlspecialchars($data["htm"]);
	$deskripsi=htmlspecialchars($data["deskripsi"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar=$gambarLama;
	} else {
		$gambar=upload();
	}
	

	//QUERY INSERT DATA
	$query= "UPDATE wisata SET
			nama = '$nama',
			alamat = '$alamat',
			operasional = '$operasional',
			htm = '$htm',
			deskripsi = '$deskripsi',
			gambar = '$gambar'
			WHERE id = $id
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function cari($keyword) {
	$query = "SELECT * FROM wisata
				WHERE 
				nama LIKE '%$keyword%' OR
				alamat LIKE '%$keyword%'
			";

	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
			alert('Username sudah terdaftar');
		</script>";
		return false;
	}




	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
			alert('konfirmasi password tidak sesuai');
			</script>";

			return false;
	}

	// enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);



}


















 ?>