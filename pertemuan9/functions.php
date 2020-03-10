<?php 

// Koneksi
$conn = mysqli_connect("Localhost", "root", "", "phpdasar");


function query($query){
	global $conn;
	$res = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($res)) {
		$rows[] = $row;
	}
	return $rows;
}
?>