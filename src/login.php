<?php include('server.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title>RAT</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
		<marquee scrollamount="15"><h1>Welcome to RAT</h1></marquee>

	<div class="container">

		<div class="header">

			<h2>Login</h2>

		</div>

		<form action="login.php" method="POST">

			<div>
				<label for="username">Username : </label>
				<i class="fa fa-user icon"></i>
				<input type="text" name="username" placeholder="Username" required>
			</div>

			<div>
				<label for="password">Password : </label>
				<input type="password" name="password" placeholder="Password" required>
			</div>

			<button type="submit" name="login_user"> LOG IN </button>

			<p>New User ? <a href="registration.php"><b>Register Here</b></a></p>


		</form>



	</div>

</body>
</html>