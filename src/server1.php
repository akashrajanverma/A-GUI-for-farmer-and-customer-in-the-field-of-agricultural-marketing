<?php

session_start();

//initialise variables

$product_name="";
$quantity="";
$rate="";

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
if(isset($_POST['rate']))
{
	$rate = mysqli_real_escape_string($db,$_POST['rate']);
}
//form validation

if(empty($quantity)) {array_push($errors, "Please enter quantity of product");}
if(empty($rate)) {array_push($errors, "Please enter rate of product");}

if(count($errors)==0)
{
	$check_product="UPDATE farmer_production SET quantity='$quantity'+quantity WHERE product_name='$product_name'";
	mysqli_query($db,$check_product);
	$check_rate="UPDATE farmer_production SET rate='$rate' WHERE product_name='$product_name'";
	mysqli_query($db,$check_rate);
	//echo "product added successfully";
}
else
{
	echo "please fill all the fields";
	//header("location:errors.php");
}
?>