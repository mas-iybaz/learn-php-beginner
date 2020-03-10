<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
// konfigurasi
$dataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM penduduk"));
$jumlahHalaman = ceil($jumlahData / $dataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$mulaiData = ($dataPerHalaman * $halamanAktif) - $dataPerHalaman;


$penduduk = query("SELECT * FROM penduduk LIMIT $mulaiData, $dataPerHalaman");

// tekan tombol cari
if (isset($_POST["cari"])) {
	// $penduduk = cari($_POST["katakunci"]);
	$hasil = [];
	$penduduk1 = query("SELECT * FROM penduduk LIMIT $mulaiData, $dataPerHalaman");
	$penduduk2 = cari($_POST["katakunci"]);
	foreach ($penduduk1 as $p1) {
		foreach ($penduduk2 as $p2) {
			if ($p1["nama"] == $p2["nama"]) {
				$hasil[] = $p2;
			}
		}
	}
	$penduduk = $hasil;
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
	<a href="logout.php">[0] LOGOUT</a><br><br>
	<a href="tambah.php">[+] Tambah Data</a>

	<br>
	<br>

	<form action="" method="POST">
		<input type="text" name="katakunci" placeholder="Masukkan Nama" size="50" autofocus>
		<button type="submit" name="cari">Cari Data</button>
	</form>

	<br>
	
	<?php if($halamanAktif > 1) : ?>
		<a href="?halaman=<?= $halamanAktif-1; ?>">&laquo;</a>
	<?php endif; ?>
	<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if($i == $halamanAktif) : ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>
	<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?= $halamanAktif+1; ?>">&raquo;</a>
	<?php endif; ?>
	<br>

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
</body>
</html>