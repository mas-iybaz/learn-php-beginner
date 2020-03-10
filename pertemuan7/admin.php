<?php 

// if (isset($_GET["submit"])) {
// 	if ($_GET["nama"]=="iqbal" && $_GET["password"]=="abc") {
// 		header("Location: admin.php");
// 	} else {
// 		header("Location: salah.php");
// 		exit;
// 	}
// }

$nama = $_GET['nama'];
$password = $_GET['password'];

if ($nama!="iqbal" && $password!="abc") {
	header("Location: salah.php");
	exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>
</head>
<body>
	<h1>Selamat Datang, <?= $nama; ?></h1>
	<a href="formlogin.php">LogOut</a>
</body>
</html>