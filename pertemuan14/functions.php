<?php 

// Koneksi
$conn = mysqli_connect("Localhost", "root", "", "phpdasar");
$id;


function query($query){
	global $conn;
	$res = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($res)) {
		$rows[] = $row;
	}
	return $rows;
}

function cari($key){
	$query = "SELECT * FROM penduduk WHERE 
				nama LIKE '%$key%' OR
				nik LIKE '%$key%'";

	return query($query);
}

function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data['nama']);
	$nik = htmlspecialchars($data['nik']);
	$kelamin = htmlspecialchars($data['kelamin']);
	$pekerjaan = htmlspecialchars($data['pekerjaan']);
	$kota = htmlspecialchars($data['kota']);
	
	// Upload Foto
	$foto = upload();

	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO penduduk VALUES('$nik', '$nama', '$kelamin', '$pekerjaan', '$kota', '$foto')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){
	$namaFoto = $_FILES['foto']['name'];
	$ukuranFoto = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah tidak ada foto diupload
	if ($error === 4) {
		echo "<script>
			alert('Pilih Gambar Dahulu');
		</script>";
		return false;
	}

	// cek apakah yang diupload gambar atau bukan
	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFoto);
	$ekstensiFoto = strtolower(end($ekstensiFoto));

	if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
		echo "<script>
			alert('Bukan ekstensi foto! upload foto . .');
		</script>";
		return false;
	}

	// cek jika ukuran terlalu besar (max = 2MB)
	if ($ukuranFoto > 2400000) {
		echo "<script>
			alert('Ukuran Foto maksimal 2 MB');
		</script>";
		return false;
	}

	// Lolos , Siap Upload
	// Generate nama gambar baru
	$namaFotoBaru = uniqid();
	$namaFotoBaru.='.';
	$namaFotoBaru.=$ekstensiFoto;
	move_uploaded_file($tmpName, 'img/'.$namaFotoBaru);

	return $namaFotoBaru;
}

function kirim($nik){
	global $id;
	$id = $nik;
}

function ubah($data){
	global $conn;
	global $id;

	$nama = htmlspecialchars($data['nama']);
	$nik = htmlspecialchars($data['nik']);
	$kelamin = htmlspecialchars($data['kelamin']);
	$pekerjaan = htmlspecialchars($data['pekerjaan']);
	$kota = htmlspecialchars($data['kota']);

	// cek apakah user pilih gambar baru
	$fotoLama = htmlspecialchars($data['fotoLama']);

	if($_FILES['foto']['error'] === 4){
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	$query = "UPDATE penduduk SET nama = '$nama', nik = '$nik', kelamin ='$kelamin', pekerjaan = '$pekerjaan', kota = '$kota', foto = '$foto' WHERE nik = '$id'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($nik){
	global $conn;

	mysqli_query($conn, "DELETE FROM penduduk WHERE nik = '$nik'");

	return mysqli_affected_rows($conn);
}

function register($data){
	global $conn;

	$username = strtolower(stripslashes($data["name"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek nama apakah sudah dipakai
	$res = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");

	if (mysqli_fetch_assoc($res)) {
		echo "<script>
			alert('Username sudah terdaftar');
		</script>";
		
		return false;
	}

	// konfirmasi password
	if ($password !== $password2) {
		echo "<script>
			alert('Konfirmasi password tidak sesuai . .');
		</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);	
}

?>