<?php 

$mhs = [
	["Muhammad Iqbal Aulia", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"],
	["IyBaz", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"],
	["Aziz", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"],
	["Haidar", "170533628515", "Pendidikan Teknik Informatika", "iqbal.madridista2909@gmail.com"]
];

$mhs[] = ["New", "170000000000", "Teknik Elektro", "new_world_order@gmail.com"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
		<?php foreach ($mhs as $a) : ?>
			<ul>
				<li>Nama : <?= $a[0]; ?></li>
				<li>NIM : <?= $a[1]; ?></li>
				<li>Program Studi : <?= $a[2]; ?></li>
				<li>Email : <?= $a[3]; ?></li>
			</ul>
		<?php endforeach; ?>

		<table border="1" cellpadding="10" cellspacing="0">
			<?php foreach ($mhs as $a) : ?>
				<tr>
					<td>Nama</td>
					<td><?= $a[0]; ?></td>
				</tr>
				<tr>
					<td>NIM</td>
					<td><?= $a[1]; ?></td>
				</tr>
				<tr>
					<td>Prodi</td>
					<td><?= $a[2]; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= $a[3]; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
</body>
</html>