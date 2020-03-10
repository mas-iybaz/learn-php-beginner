<?php 

// $mhs = [["Iqbal", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"],
// ["Haidar", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"],
// ["Aziz", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"]
// ];

// Array Assoc.. key nya string
// $mhs = [
// 	[
// 		"nama" => "Iqbal", 
// 		"nim" => "170533628515", 
// 		"prodi" => "Pendidikan Teknik Informatika", 
// 		"email" => "iqbal.madridista2909@gmail.com"
// 	],
// 	[
// 		"nama" => "Aziz", 
// 		"nim" => "155533628515", 
// 		"prodi" => "Teknik Informatika", 
// 		"email" => "aziz.madridista2909@gmail.com",
// 		"tugas" => [
// 			"matematika" => 90,
// 			"fisika" => 85,
// 			"kimia" => 80,
// 			"biologi" => 87
// 		]
// 	]
// ];
// echo $mhs[1]["tugas"]["biologi"];

$mhs = [
	[
		"nama" => "Iqbal", 
		"nim" => "170533628515", 
		"prodi" => "Pendidikan Teknik Informatika", 
		"email" => "iqbal.madridista2909@gmail.com",
		"gambar" => "img1.png"
	],
	[
		"nama" => "Aziz", 
		"nim" => "155533628515", 
		"prodi" => "Teknik Informatika", 
		"email" => "aziz.madridista2909@gmail.com",
		"gambar" => "img2.png"
	]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar</h1>

	<?php foreach($mhs as $m) : ?>
		<ul>
			<li>
				<img src="img/<?= $m["gambar"] ?>">
			</li>
			<li>Nama : <?= $m["nama"]; ?></li>
			<li>NIM : <?= $m["nim"]; ?></li>
			<li>Prodi : <?= $m["prodi"]; ?></li>
			<li>Jurusan : <?= $m["email"]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>
</html>