<?php 
	// Date (untuk menampilkan tanggal)
	// echo date("l, d-F-Y");

	// Time
	// UNIX Timestamp / EPOCH TIME
	// Detik yang sudah berlalu sejak 1 Januari 1970
	// echo time();
	// echo date("l, d-F-Y", time()+60*60*24*99);
	
	// mktime
	// membuat waktu sendiri
	// mktime(0,0,0,0,0,0)
	// jam, menit, detik, bulan, tanggal, tahun
	// echo date("l", mktime(0, 0, 0, 9, 29, 1999));

	// strtotime
	// echo date("l", strtotime("29 Sep 1999"));
?>