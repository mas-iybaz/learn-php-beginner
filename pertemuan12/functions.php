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
	$foto = htmlspecialchars($data['foto']);

	$query = "INSERT INTO penduduk VALUES('$nik', '$nama', '$kelamin', '$pekerjaan', '$kota', '$foto')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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
	$foto = htmlspecialchars($data['foto']);

	$query = "UPDATE penduduk SET nama = '$nama', nik = '$nik', kelamin ='$kelamin', pekerjaan = '$pekerjaan', kota = '$kota', foto = '$foto' WHERE nik = '$id'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($nik){
	global $conn;

	mysqli_query($conn, "DELETE FROM penduduk WHERE nik = '$nik'");

	return mysqli_affected_rows($conn);
}

?>