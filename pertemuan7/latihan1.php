<?php 

$penduduk = [
	[
		"nama" => "Sutrisno",
		"nik" => "3519030707720001",
		"kelamin" => "Laki-laki",
		"pekerjaan" => "Petani",
		"kota" => "Madiun",
		"foto" => "sutrisno.jpg"
	],
	[
		"nama" => "Siti Maemunah",
		"nik" => "3519030205730002",
		"kelamin" => "Perempuan",
		"pekerjaan" => "Ibu Rumah Tangga",
		"kota" => "Madiun",
		"foto" => "siti.jpg"
	],
	[
		"nama" => "Muhammad Iqbal Aulia",
		"nik" => "3519032909990002",
		"kelamin" => "Laki-laki",
		"pekerjaan" => "Mahasiswa",
		"kota" => "Madiun",
		"foto" => "iqbal.jpg"
	],
	[
		"nama" => "Haidar Aziz Habibullah",
		"nik" => "3519032701140001",
		"kelamin" => "Laki-laki",
		"pekerjaan" => "Pelajar",
		"kota" => "Madiun",
		"foto" => "aziz.jpg"
	]
];

// SUPERGLOBALS
// $_GET
$_GET["nama"] = "Iqbal";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GET</title>
	<style>
		img {
			max-height: 100px;
			max-width: 100px;
		}
	</style>
</head>
<body>
	<h1>Daftar Penduduk</h1>

	<ul>
	<?php foreach($penduduk as $p) : ?>
		<!-- <li><img src="img/<?= $p["foto"]; ?>"></li> -->
		<li>
			<a href="latihan2.php?nama=<?= $p["nama"]; ?>&nik=<?= $p["nik"] ?>&kelamin=<?= $p["kelamin"] ?>&pekerjaan=<?= $p["pekerjaan"] ?>&kota=<?= $p["kota"] ?>"><?= $p["nama"]; ?></a>
		</li>
		<!-- <li><?= $p["nik"]; ?></li> -->
	<?php endforeach; ?>
	</ul>
</body>
</html>