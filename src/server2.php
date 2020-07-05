<?php

session_start();

//initialise variables

$product_name="";
$quantity="";
$account_balance="";
$user = $_SESSION['username'];

$errors = array();
$error1 = array();

//connect to db

$db = mysqli_connect('localhost','root','','registration') or die("could not connect to database");

//register users

if(isset($_POST['product_name']))
{
	$product_name = mysqli_real_escape_string($db,$_POST['product_name']);
}

if(isset($_POST['quantity']))
{
	$quantity = mysqli_real_escape_string($db,$_POST['quantity']);
}
if(isset($_POST['add_balance']))
{
	$add_balance = mysqli_real_escape_string($db,$_POST['add_balance']);
}
//form validation

if(empty($quantity)) {array_push($errors, "Please enter quantity of product");}
if(count($errors)==0)
{
	$insert_balance = "UPDATE customer SET account_balance=account_balance+'$add_balance' WHERE username='$user'";
	mysqli_query($db,$insert_balance);
	$qty = "SELECT quantity FROM farmer_production WHERE product_name='$product_name'";
	$results = mysqli_query($db,$qty);
	$userqty = mysqli_fetch_assoc($results);
	//echo $userqty['quantity'];
	if($userqty['quantity']- $quantity < 0)
	{
		$update_quantity = "UPDATE farmer_production SET quantity=0 WHERE product_name='$product_name' ";
		mysqli_query($db,$update_quantity);
		$quantity_user=$userqty['quantity'];
	}
	else
	{
		$update_quantity = "UPDATE farmer_production SET quantity=quantity-'$quantity' WHERE product_name='$product_name' ";
		mysqli_query($db,$update_quantity);
		$quantity_user=$quantity;
	}

	$rate = "SELECT rate FROM farmer_production WHERE product_name='$product_name'";
	$results = mysqli_query($db,$rate);
	$userrate = mysqli_fetch_assoc($results);

	$cost_price=$userrate['rate']*$quantity_user;

	$update_balance = "UPDATE customer SET account_balance=account_balance-'$cost_price' WHERE username='$user'";
	mysqli_query($db,$update_balance);
}
else
{
	echo "please fill all the fields";
	//header("location:errors.php");
}
?>