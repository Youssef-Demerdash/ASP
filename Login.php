
<!DOCTYPE html>
<html>
   <head>
     <title></title>
   </head>

   <body>
      <h1>Login</h1>
      <form action="" method="post">
      <label>Email:</label><br>
      <input type="text" name="Email">  <br>
      <label>Password:</label><br>
      <input type="Password" name="Password"><br>
      <input type="submit" value="Submit" name="Submit">
      <input type="reset">


</form>

 <?php
   //start session
   session_start();
   include_once "includes/DB.inc.php";
   
   //include database connection file
   
   //grab data from user and see if it exists in database
   if($_SERVER["REQUEST_METHOD"]=="POST"){

    $Email=$_POST["Email"];
	 $Password=$_POST["Password"];
   $sql="Select * from students where Email ='$Email' and password='$Password'";
   $result= mysqli_query($conn,$sql);
   if($row=mysqli_fetch_array($result)){
    $_SESSION["ID"]=$row[0];
    $_SESSION["FName"]=$row["FName"];
    $_SESSION["LName"]=$row["LName"];
    $_SESSION["Email"]=$row["Email"];
    $_SESSION["Password"]=$row["Password"];
    $_SESSION["Major"]=$row["Major"];
    $_SESSION["Minor"]=$row["Minor"];
    $_SESSION["Status"]=$row["Status"];
    $_SESSION["Sem gpa"]=$row["Sem gpa"];
    $_SESSION["Cum gpa"]=$row["Cum gpa"];
    $_SESSION["Sem crdh"]=$row["Sem crdh"];
    $_SESSION["Total crdh"]=$row["Total crdh"];

    header("Location:Home.php?login=success");
   }else{
    echo "Invalid Email or Password";
   }
   
   //select data from database where email and password matches
   //if true then use session variables to use it as long as session is started

	
   }

 
 ?>
   </body>
</html>
