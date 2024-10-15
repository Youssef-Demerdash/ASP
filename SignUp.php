<?php
  include_once "includes/DB.inc.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  // Autoload PHPMailer classes via Composer
  require 'vendor/autoload.php';
?>

<h1>Sign Up</h1>
<!DOCTYPE html>
<html>
   <head>
     <title></title>
   </head>

   <body>
   <form action="" method="post">

   <label>First Name:</label><br>
  <input type="text" name="FName"><br>

  <label>Last Name:</label><br>
  <input type="text" name="LName"><br>

  <label>Email:</label><br>
  <input type="text" name="Email"><br>

  <label>Password:</label><br>
  <input type="Password" name="Password"><br>

  <label>Faculty:</label><br>
  <input type="text" name="Major"><br>

  <input type="submit" value="Submit" name="Submit">
  <input type="reset">

</form>
<?php
 //grap data from user if form was submitted 

  if($_SERVER["REQUEST_METHOD"]=="POST"){ //check if form was submitted
	$Fname=htmlspecialchars($_POST["FName"]);
	$Lname=htmlspecialchars($_POST["LName"]);
	$Email=htmlspecialchars($_POST["Email"]);
	$Password=htmlspecialchars($_POST["Password"]);
	$Major=htmlspecialchars($_POST["Major"]);
    $Minor="";
    $Status="Regular Student";

    $token = bin2hex(random_bytes(3));
    //insert it to database 
	$sql="insert into students(FName,LName,Email,Password,Major,Minor,Status) 
	values('$Fname','$Lname','$Email','$Password','$Major','$Minor','$Status')";
	$result=mysqli_query($conn,$sql);
  //$ID="Select ID from students where Email ='$Email' and password='$Password'";
    //redirect the user back to index.php 
	if($result)	{
        require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("youssefashrafdem@gmail.com", "ASP");
$email->setSubject("VERIFY YOUR MAIL");
$email->addTo($Email, $Fname);
$email->addContent("text/plain", "Your code: " . $token);

$sendgrid = new \SendGrid('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');

try {
    $response = $sendgrid->send($email);
    // print $response->statusCode() . "\n";
    // print_r($response->headers());
    // print $response->body() . "\n";
    
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
setcookie("VCode", $token, time() + 1500); 
setcookie("Emailforv",$Email,time()+1500);
setcookie("Fnameforv",$Fname,time()+1500);
header("Location:Varifymail.php");
//         require 'vendor/autoload.php';

//         $email = new \SendGrid\Mail\Mail();
//         $email->setFrom("youssefashrafdem@gmail.com", "ASP");
//         $email->setSubject("Varify your account throw this code");
//         $email->addTo($Email, $Fname);
//         $email->addContent("your code: ".$token);
        
//         $sendgrid = new \SendGrid('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
// ');
//         try {
//             $response = $sendgrid->send($email);
//             echo 'Email sent successfully!';
//         } catch (Exception $e) {
//             echo 'Caught exception: '. $e->getMessage() ."\n";
//         }
        
    }
	// 	header("Location:Home.php");
	// }
}

?>

   </body>