<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasi Sukses</title>
</head>
<body>
	<h1 align="center">REGISTRASI BERHASIL</h1>
	<br>
	<h2><a href="login.php">Klik Link Berikut untuk Login</a></h2>
</body>
</html>