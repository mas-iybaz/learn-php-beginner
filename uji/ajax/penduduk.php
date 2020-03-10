<?php
require '../functions.php';

// pagination
$dataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM penduduk"));
$jumlahHalaman = ceil($jumlahData / $dataPerHalaman);
$halamanAktif = (isset($_GET["hAktif"])) ? $_GET["hAktif"] : 1;
$mulaiData = ($dataPerHalaman * $halamanAktif) - $dataPerHalaman;


$penduduk1 = query("SELECT * FROM penduduk LIMIT $mulaiData, $dataPerHalaman");

$kataKunci = $_GET["katakunci"];
$penduduk2 = query("SELECT * FROM penduduk WHERE nama LIKE '%$kataKunci%'");

$hasil = [];
foreach ($penduduk1 as $p1) {
	foreach ($penduduk2 as $p2) {
		if ($p1["nama"] == $p2["nama"]) {
			$hasil[] = $p2;
		}
	}
}
$penduduk = $hasil;

?>

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