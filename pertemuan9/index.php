<?php 

// Koneksi
$conn = mysqli_connect("Localhost", "root", "", "phpdasar");

// Ambil data penduduk dari tabel penduduk
$res = mysqli_query($conn, "SELECT * FROM penduduk");

if (!$res) {
	echo mysqli_error($conn);
}

// Ambil data dari hasil / $res (fetch)
// mysqli_fetch_row() => Mengembalikan array numerik untuk indeksnya
// mysqli_fetch_assoc() => Mengembalikan array string untuk indeksnya
// mysqli_fetch_array() => Mengembalikan array numerik dan string
// mysqli_fetch_object() => Mengembalikan nilai berbasis object

// while ($penduduk = mysqli_fetch_assoc($res)) {
// 	var_dump($penduduk);
// }

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
		<?php while ($row = mysqli_fetch_assoc($res)) : ?>
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
				<a href=""> Hapus</a>
			</td>
		</tr>
		<?php $no_urut++; ?>
		<?php endwhile; ?>
	</table>
</body>
</html>