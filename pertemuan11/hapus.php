<?php 

require 'functions.php';

$nik = $_GET["nik"];

if (hapus($nik) > 0) {
	header("Location: index2.php");
} else {
	echo "Data Gagal Dihapus!";
}

?>