<?php
session_start();
include_once "includes/DB.inc.php";
?>
<h1>Varifing Mail</h1>
<!DOCTYPE html>
<html>
   <head>
     <title></title>
   </head>
   <body>
   <form action="" method="post">
   <label>Enter You varifacation Code:</label><br>
   <input type="text" name="VCode"><br>

   <input type="submit" value="Submit" name="Submit">
  <input type="reset">

   </form>
   <?php
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $VCode=$_POST["VCode"];
    echo $_COOKIE['VCode']."<br>";
    $VC=$_COOKIE['VCode'];
    if($VC==$VCode){
    echo "Mail Varified Successfully";
    header("Location:Login.php");
    }
   }
    
   ?>
   </body>