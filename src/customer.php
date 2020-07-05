<?php include('server2.php') ?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome : Customer Portal</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
		<marquee><h1>AGRICULTURAL MARKETING</h1></marquee>

	<div class="container">

		<div class="header">

			<h2>!!! WELCOME !!! <?php echo $_SESSION['username']; ?></h2>

		</div>

		<form action="customer.php" method="POST">

			<div>
				<input type="radio" name="product_name" value="potato" checked>Potato<br>
				<input type="radio" name="product_name" value="tomato">Tomato<br>
				<input type="radio" name="product_name" value="rice" >Rice<br>
				<input type="radio" name="product_name" value="wheat" >Wheat<br>
				<input type="radio" name="product_name" value="pulse" >Pulse<br>
				<input type="radio" name="product_name" value="soyabean" >Soyabean<br>
			</div>

			<div>
				<label for="quantity">Quantity : </label>
				<input type="number" name="quantity" placeholder="in (Kg)" required>
			</div>

			<div>
				<label for="add_balance">Add Balance : </label>
				<input type="number" name="add_balance" placeholder="in (Rs)">
			</div>

			<button type="submit" name="submit_customer"> BUY </button>


		</form>



	</div>

</body>
</html>