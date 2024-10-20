<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/home.css">

	<title>Home</title>
</head>
<?php
session_start();

if(!empty($_SESSION['ID'])) {
	echo "<h1>Welcome ".$_SESSION['FName']."</h1>";
	echo"<a href='profile.php'>View Profile</a><br><br>";
	echo"<a href='Edit.php'>Edit Profile</a><br><br>";
	echo"<a href='Delete.php'>Delete Account</a><br><br>";
	echo"<a href='SignOut.php'>SignOut Here</a>";
}
else{
	echo "<h1>Welcome</h1>";
	echo"<a href='Login.php'>Login</a>";
	echo"<br>";
	echo"<br><a href='SignUp.php'>Signup Here</a>";
}
?>
</html>