<?php

	require 'functions.php';

	if (isset($_POST["register"])) {
		if (register($_POST) > 0) {
			header("Location: regisSukses.php");
			exit;
		} else {
			echo mysqli_error($conn);
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
	<h1>Registrasi</h1>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="name">Username : </label>
				<input type="text" name="name" id="name">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">Confirm Password : </label>
				<input type="password" name="password2" id="password2">
			</li>
			<button type="submit" name="register">DAFTAR</button>
		</ul>
	</form>
</body>
</html>