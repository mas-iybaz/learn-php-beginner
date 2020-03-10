<?php 
	// Komentar satu baris
	/*
	Ini komentaer
	Ini juga
	*/
	// Sintaks PHP
	// Standar output = echo, print, print_r, var_dump

	// echo "Muhammad Iqbal Aulia";
	// print "Iqbal";
	// print_r("expression");
	// var_dump("iyBaz");
	// echo 123;
	// echo false;
	// echo "Jum'at";

	// penulisan sintaks php
	// - php didalam html
	// - html didalam php

	// VARIABEL
	$nama = "Iqbal";

	// OPERATOR
	// aritmatika ( + - * / % )
	$a = 10;
	$b = 20;
	$c = $a + $b;

	// PENGGABUNG 
	$nama1 = "Muhammad";
	$nama2 = "Iqbal";
	// echo $nama1." ".$nama2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Belajar PHP</title>
</head>
<body>
	<h1>Hello World.. Selamat datang <?php echo $nama; ?></h6>
	<h1>Total == <?php echo $a." + ".$b." = ".$c; ?></h6>
	<h1>Gabungan = <?php echo $nama1." ".$nama2; ?></h1>
</body>
</html>