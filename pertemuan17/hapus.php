<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$nik = $_GET["nik"];

if (hapus($nik) > 0) {
	header("Location: index2.php");
} else {
	echo "Data Gagal Dihapus!";
}

?>