<?php 

require 'functions.php';

$penduduk = query("SELECT * FROM penduduk");


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
				<a href="">Ubah </a>
				|
				<a href="hapus.php?nik=<?= $row["nik"]; ?>" onclick="return confirm('YAKIN ?');"> Hapus</a>
			</td>
		</tr>
		<?php $no_urut++; ?>
		<?php endforeach; ?>
	</table>
</body>
</html>