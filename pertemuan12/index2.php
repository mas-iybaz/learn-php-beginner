<?php 

require 'functions.php';

$penduduk = query("SELECT * FROM penduduk ORDER BY nik ASC");

// tekan tombol cari
if (isset($_POST["cari"])) {
	$penduduk = cari($_POST["katakunci"]);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
</head>
<body>
	<!-- Daftar penduduk -->
	<h1>Daftar penduduk</h1>
	<a href="tambah.php">[+] Tambah Data</a>

	<br>
	<br>

	<form action="" method="POST">
		<input type="text" name="katakunci" placeholder="Masukkan Nama" size="50" autofocus>
		<button type="submit" name="cari">Cari Data</button>
	</form>

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