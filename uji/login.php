<?php 

session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
	$id = $_COOKIE['id'];
	$username = $_COOKIE['username'];

	// ambil user
	$res = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($res);

	// cek cookie dan username
	if ($username === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location: index2.php");
	exit;
}

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

			// cek remember
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('username', hash('sha256', $row['username']), time()+60);
			}

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
				<br>
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">REMEMBER ME</label>
			</ul>
		</form>

	</body>
</html>