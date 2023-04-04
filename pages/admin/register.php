<?php

require '../config/config.php';


if (isset($_POST["register"])) {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$notelp = $_POST['no_telp'];

	$result = mysqli_query($conn, "INSERT INTO admin (username, password,email,alamat,no_telp) VALUES('$username','$password', '$email', '$alamat', '$notelp')");

	if ($result) {
		echo ("<script>alert('Registrasi berhasil silakan login')</script>");
		session_start();
		header("location: login.php");
	} else {
		echo ("<script>alert('Registrasi gagal silakan coba lagi')</script>");

	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Register Form </title>
</head>

<body>
	<div class="container">
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Email" name="email">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password">
			</div>
			<div class="input-group">
				<input type="text" placeholder="Alamat" name="alamat">
			</div>
			<div class="input-group">
				<input type="number" placeholder="No Telpon" name="no_telp">
			</div>
			<div class="input-group">
				<button type="submit" name="register" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>