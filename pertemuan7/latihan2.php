<?php 

// Cek data
if (!isset($_GET["nama"]) ||
	!isset($_GET["nik"]) ||
	!isset($_GET["kelamin"]) ||
	!isset($_GET["pekerjaan"]) ||
	!isset($_GET["kota"])) {
	// Redirect
	header("Location: latihan1.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Penduduk</title>
</head>
<body>
	<ul>
		<li><img src="img/aziz.jpg"></li>
		<li><?= $_GET["nama"]; ?></li>
		<li><?= $_GET["nik"]; ?></li>
		<li><?= $_GET["kelamin"]; ?></li>
		<li><?= $_GET["pekerjaan"]; ?></li>
		<li><?= $_GET["kota"]; ?></li>
	</ul>

	<a href="latihan1.php">Kembali</a>
</body>
</html>