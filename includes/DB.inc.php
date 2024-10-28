<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD
$DB = "project";
=======
$DB = "asp";
>>>>>>> 3fbfe76f8c57f567f75099d0e40e0dada37a875d

$conn = mysqli_connect($servername,$username,$password,$DB);


if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}