<?php 

session_start();

if (isset($_SESSION["login"])) {
	header("Location: index2.php");
	exit;
}

require 'functions.php';

if (isset($_POST["login"])) {
	$username = $_POST["name"];
	$password = $_POST["password"];

	$res = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if (mysqli_num_rows($res) === 1) {
		// cek password
		$row = mysqli_fetch_assoc($res);

		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			header("Location: index2.php");
			exit;
		}
	}

	$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body>
		<h1>Login</h1>

		<?php if(isset($error)) : ?>
			<p style="color: red; font-style: italic;">Username / Password Salah . . Masukkan Ulang!</p>
		<?php endif; ?>

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
				<button type="submit" name="login">MASUK</button>
			</ul>
		</form>

	</body>
</html>