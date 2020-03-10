<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$penduduk = query("SELECT * FROM penduduk");

// tekan tombol cari
if (isset($_GET["cari"])) {
	$penduduk = cari($_GET["katakunci"]);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<style>
		th {
			background-color: #ACACAC;
		}
		td {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<!-- Daftar penduduk -->
	<h1>Daftar penduduk</h1>
	<a href="logout.php" onclick="return confirm('YAKIN ?');">[0] LOGOUT</a><br><br>
	<a href="tambah.php">[+] Tambah Data</a>

	<br>
	<br>
	
	<form action="" method="GET">
		<input type="text" name="katakunci" placeholder="Masukkan Nama" size="50" autofocus id="katakunci">
		<button type="submit" name="cari" id="tombol-cari">Cari Data</button>
	</form>

	<br>
	
	<br>

	<div id="container">
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No Urut</th>
			<th>Gambar</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Pekerjaan</th>
			<th>Kota</th>
			<th>Aksi</th>
		</tr>

		<?php $no_urut = 1; ?>
		<?php foreach($penduduk as $row) : ?>
		<tr>
			<td><?= $no_urut; ?></td>
			<td>
				<img src="img/<?= $row["foto"]; ?>" width="50">
			</td>
			<td><?= $row["nik"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["kelamin"]; ?></td>
			<td><?= $row["pekerjaan"]; ?></td>
			<td><?= $row["kota"]; ?></td>
			<td>
				<a href="ubah.php?nik=<?= $row["nik"]; ?>">Ubah </a>
				|
				<a href="hapus.php?nik=<?= $row["nik"]; ?>" onclick="return confirm('YAKIN ?');"> Hapus</a>
			</td>
		</tr>
		<?php $no_urut++; ?>
		<?php endforeach; ?>
	</table>
	</div>
	<script src="js/script.js"></script>
</body>
</html>