<?php 

require 'functions.php';

if (isset($_POST['submit'])) {

	if (tambah($_POST) > 0) {
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
	<title>Tambah Data</title>
</head>
<body>
	<h1>Tambah Data Penduduk</h1>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="nik">NIK</label>
				<input type="text" name="nik" id="nik" required>
			</li>
			<li>
				<label for="kelamin">Kelamin</label>
				<select name="kelamin" id="kelamin" required>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</li>
			<li>
				<label for="pekerjaan">Pekerjaan</label>
				<input type="text" name="pekerjaan" id="pekerjaan" required>
			</li>
			<li>
				<label for="kota">Kota</label>
				<input type="text" name="kota" id="kota" required>
			</li>
			<li>
				<label for="foto">Foto</label>
				<input type="text" name="foto" id="foto" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah</button>
			</li>
		</ul>
	</form>
</body>
</html>