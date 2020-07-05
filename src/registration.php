<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>RAT</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
		<marquee><h1>Welcome to RAT</h1></marquee>

	<div class="container">

		<div class="header">

			<h2>Register</h2>

		</div>

		<form action="registration.php" method="POST">


			<div>
				<label for="aadhar">Aadhar No : </label>
				<input type="text" name="aadhar" placeholder="AADHAR" required>
			</div>

			<div>
				<label for="username">Username : </label>
				<input type="text" name="username" placeholder="Username" required>
			</div>

			<div>
				<label for="password">Password : </label>
				<input type="password" name="password_1" placeholder="Password">
			</div>

			<div>
				<label for="password">Confirm Password : </label>
				<input type="password" name="password_2" placeholder="Re-enter Password">
			</div>

			<button type="submit" name="reg_user"> Submit </button>

			<p>Already Registered ?<a href="login.php"><b>Log In</b></a></p>

		</form>



	</div>

</body>
</html>