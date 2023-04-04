<?php

require '../config/config.php';


if (isset($_POST["login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

	$data = mysqli_num_rows($result);
	$checkuser = mysqli_fetch_array($result);
	$upassword = $checkuser['password'];

	if ($checkuser > 0) {
		if (password_verify($password, $upassword)) {
			echo ("<script>alert('Login berhasil')</script>");
			$row = $checkuser;
			$_SESSION['username'] = $row['username'];
			header("Location: index.php");
		} else {

			echo ("<script>alert('Password salah silakan isi kembali')</script>");
		}
	} else {
		echo ("<script>alert('Username dan Password salah silakan isi kembali')</script>");

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

	<title>Login Form </title>
</head>

<body>
	<div class="container">
		<form action="" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" name="login" class="btn">Login</button>
			</div>
			<p class="login-register-text">Have an account? <a href="register.php">Register</a>.</p>
		</form>
	</div>
</body>

</html>