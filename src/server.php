<?php

session_start();

//initialise variables

$username = "";
$aadhar = "";
$password_1="";
$password_2="";

$errors = array();
$error1 = array();

//connect to db

$db = mysqli_connect('localhost','root','','registration') or die("could not connect to database");

//register users


if(isset($_POST['aadhar']))
{
	$aadhar = mysqli_real_escape_string($db,$_POST['aadhar']);
}
if(isset($_POST['username']))
{
	$username = mysqli_real_escape_string($db,$_POST['username']);
}
if(isset($_POST['password_1']))
{
	$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
}
if(isset($_POST['password_2']))
{
	$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
}
//form validation

if(empty($aadhar)) {array_push($errors, "Aadhar is required");}
if(empty($username)) {array_push($errors, "Username is required");}
if(empty($password_1)) {array_push($errors, "Please enter password");}
if($password_1 != $password_2) {array_push($errors, "Password does not matched");}

//check the databse if the username is same

	$user_check_query = "SELECT * FROM traveller WHERE aadhar = '$aadhar' or username = '$username' LIMIT 1";


$results = mysqli_query($db,$user_check_query);
$user = mysqli_fetch_assoc($results);

if($user)
{
	if($user['aadhar'] == $aadhar){array_push($errors, "This aadhar is already linked");}
	if($user['username'] == $username){array_push($errors, "Username already exists");}
}

//register if no error

if(count($errors)==0)
{
	$password = md5($password_1);
	
		$query = "INSERT INTO traveller (aadhar,username,password) VALUES ('$aadhar' , '$username' , '$password')";
		mysqli_query($db,$query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header("location:login.php");
	

}

//LOGIN USER

if(isset($_POST['login_user']))
{

	if(isset($_POST['username']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		//echo $username;
	}
	if(isset($_POST['password']))
	{
		$password = mysqli_real_escape_string($db,$_POST['password']);
	}

	if(empty($username)) {array_push($error1, "Username is required");}
	if(empty($password)) {array_push($error1, "Please enter password");}

	//echo "no error";
	if(count($error1)==0)
	{
		//echo "no error";
		$password = md5($password);
			$query = "SELECT * FROM traveller WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db,$query);
			//echo "hii";

			if(mysqli_num_rows($results))
			{
				$_SESSION['username']=$username;
				$_SESSION['success']="succesfully logged in";
				header("location: http://127.0.0.1:5000/");
			}
			
			else
			{
				echo "wrong username/password";
			}
		
	}
	else
	{
		echo "lots of errors";
	}
}
?>