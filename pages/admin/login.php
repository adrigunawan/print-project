<?php

require '../../config/config.php';


if (isset($_POST["login"])) {
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username='" . $username . "' AND password = '" . md5($password) . "'");

	if (mysqli_num_rows($result) > 0) {
		$d = mysqli_fetch_object($result);

		if ($d->role == "user") {
			$_SESSION['user'] = $username;
			$_SESSION['a_global'] = $d;
			$_SESSION['id'] = $d->id;

			echo '<script>
			
			alert("Login berhasil");
			window.location.href = "../customer/index.php"
			
			</script>';
		} else if ($d->role == "admin") {
			$_SESSION['admin'] = $username;
			$_SESSION['a_global'] = $d;
			$_SESSION['id'] = $d->id;

			echo '<script>
			
			alert("Login berhasil");
			window.location.href = "index.php"
			
			</script>';
		}

	} else {
		echo '<script>
		
		alert("Login gagal");
		window.location.href = "login.php"
		
		</script>';
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../../css/style.css">

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
				<input type="submit" name="login" class="btn" value="Login">
			</div>
			<p class="login-register-text">Have an account? <a href="register.php">Register</a>.</p>
		</form>
	</div>
</body>

</html>