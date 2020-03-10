<?php 

require 'functions.php';

// ambil data url
$nik_0 = $_GET["nik"];

kirim($nik_0);

// query
$penduduk = query("SELECT * FROM penduduk WHERE nik='$nik_0'")[0];


if (isset($_POST['submit'])) {

	if (ubah($_POST) > 0) {
		header("Location: index2.php");
		exit;
	} else {
		echo "Gagal.!<br>";
		echo mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data</title>
</head>
<body>
	<h1>Ubah Data Penduduk</h1>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="fotoLama" value="<?= $penduduk["foto"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" required value="<?= $penduduk["nama"]; ?>">
			</li>
			<li>
				<label for="nik">NIK</label>
				<input type="text" name="nik" id="nik" required value="<?= $penduduk["nik"]; ?>">
			</li>
			<li>
				<label for="kelamin">Kelamin</label>
				<select name="kelamin" id="kelamin" required value="">
					<option value="<?= $penduduk["kelamin"]; ?>" disabled> <?= $penduduk["kelamin"]; ?> </option>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</li>
			<li>
				<label for="pekerjaan">Pekerjaan</label>
				<input type="text" name="pekerjaan" id="pekerjaan" required value="<?= $penduduk["pekerjaan"]; ?>">
			</li>
			<li>
				<label for="kota">Kota</label>
				<input type="text" name="kota" id="kota" required value="<?= $penduduk["kota"]; ?>">
			</li>
			<li>
				<label for="foto">Foto</label>
				<br>
				<img src="img/<?= $penduduk["foto"]; ?>" width="50">
				<br>
				<input type="file" name="foto" id="foto">
			</li>
			<li>
				<button type="submit" name="submit">Ubah</button>
			</li>
		</ul>
	</form>
</body>
</html>