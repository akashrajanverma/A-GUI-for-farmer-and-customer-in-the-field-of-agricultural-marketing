<?php include('server1.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome : Farmer Portal</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<marquee><h1>AGRICULTURAL MARKETING</h1></marquee>
	<div class="container">

		<div class="header">

			<h2>!!! WELCOME !!! <?php echo $_SESSION['username']; ?></h2>

		</div>

		<form action="farmer.php" method="POST">

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
				<label for="rate">Rate : </label>
				<input type="number" name="rate" placeholder="per Kg" required>
			</div>

			<button type="submit" name="submit_farmer"> ADD PRODUCT </button>


		</form>



	</div>

</body>
</html>