<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
// konfigurasi
$dataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM penduduk"));
$jumlahHalaman = ceil($jumlahData / $dataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$mulaiData = ($dataPerHalaman * $halamanAktif) - $dataPerHalaman;


$penduduk = query("SELECT * FROM penduduk LIMIT $mulaiData, $dataPerHalaman");

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
		<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
			<?php if($i == $halamanAktif) : ?>
				<input type="text" id="hAktif" value="<?= $i; ?>" hidden>
			<?php endif; ?>
		<?php endfor; ?>
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
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>