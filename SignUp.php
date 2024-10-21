<?php
  include_once "includes/DB.inc.php";
  include "classes.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  // Autoload PHPMailer classes via Composer
  require 'vendor/autoload.php';
?>

<h1>Sign Up</h1>
<!DOCTYPE html>
<html>
   <head>
     <title>Sign Up</title>
     <script>
       function toggleRoleOptions() {
         var role = document.getElementById('role').value;
         var majorDiv = document.getElementById('majorDiv');
         var facultyRoleDiv = document.getElementById('facultymemberrole');
         
         // Show Major dropdown if the role is "Student"
         if (role === 'Student') {
           majorDiv.style.display = 'block';
         } else {
           majorDiv.style.display = 'none';
         }
         
         // Show Faculty Member Role dropdown if the role is "Faculty Member"
         if (role === 'Faculty Member') {
           facultyRoleDiv.style.display = 'block';
         } else {
           facultyRoleDiv.style.display = 'none';
         }
       }
       function toggleFMRoleOptions(){
        
       }
     </script>
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

  <label>Role:</label><br>
   <select name="Role" id="role" onchange="toggleRoleOptions()">
    <option value="">Select Your Role</option>
     <option value="Student">Student</option>
     <option value="Faculty Member">Faculty Member</option>
     <option value="Admin">Admin</option>
   </select><br>

   <div id="majorDiv" style="display:none;">
     <label>Major:</label><br>
     <select name="Major">
       <option value="Computer Science">Computer Science</option>
       <option value="Law">Law</option>
       <option value="Pharmacy">Pharmacy</option>
       <option value="Dentistry">Dentistry</option>
       <option value="Engineering">Engineering</option>
     </select><br>
   </div>

   <div id="facultymemberrole" style="display:none;">
    <label>Faculty Memeber Role:</label><br>
    <select name="FRole" id="FMRole" onchange="toggleFMRoleOptions()">
      <option value="Doctor">Doctor</option>
      <option value="TA">TA</option>
    </select><br>
      </div>
   <br><br>

  <input type="submit" value="Submit" name="Submit">
  <input type="reset">

</form>
<?php
 //grap data from user if form was submitted 

  if($_SERVER["REQUEST_METHOD"]=="POST"){ //check if form was submitted
    $ROLE=htmlspecialchars($_POST["Role"]);
    if($ROLE==="Admin"){
      $Fname=htmlspecialchars($_POST["FName"]);
	    $Lname=htmlspecialchars($_POST["LName"]);
	    $Email=htmlspecialchars($_POST["Email"]);
	    $Password=htmlspecialchars($_POST["Password"]);
      $ROLEID=0;
      $Admin=new Admin($Fname,$Lname,$Email,$password,$ROLE,$ROLEID);
      $sql="insert into admins(FName,LName,Email,Password,Role,RoleID) 
	    values('$Fname','$Lname','$Email','$Password','$ROLE',$ROLEID)";
	    $result=mysqli_query($conn,$sql);
    }else if($ROLE==="Student"){
      $Fname=htmlspecialchars($_POST["FName"]);
	    $Lname=htmlspecialchars($_POST["LName"]);
	    $Email=htmlspecialchars($_POST["Email"]);
	    $Password=htmlspecialchars($_POST["Password"]);
      $Role=htmlspecialchars($_POST["Role"]);
	    $Major=htmlspecialchars($_POST["Major"]);
      $Minor="";
      $Status="Regular Student";
      $ROLEID=1;
      $Student=new Student($Fname,$Lname,$Email,$Password,$Role,$ROLEID,$Major,$Minor,$Status);
	    $sql="insert into Students(FName,LName,Email,Password,Role,RoleID,Major,Minor,Status) 
	    values('$Fname','$Lname','$Email','$Password','$Role','$ROLEID','$Major','$Minor','$Status')";
	    $result=mysqli_query($conn,$sql);
    }else if($ROLE==="Faculty Member"){
      $FROLE=htmlspecialchars($_POST['FRole']);
      if($FROLE==="Doctor"){
        $Fname=htmlspecialchars($_POST["FName"]);
        $Lname=htmlspecialchars($_POST["LName"]);
        $Email=htmlspecialchars($_POST["Email"]);
        $Password=htmlspecialchars($_POST["Password"]);
        $Role=htmlspecialchars($_POST['FRole']);
        $ROLEID=2;
        $faculty="";
        $num_Courses=[];
        $Doctor=new Doctor($Fname,$Lname,$Email,$Password,$Role,$ROLEID,$faculty,$num_Courses);
        $sql="insert into Doctors(FName,LName,Email,Password,Role,RoleID,num_Courses)
        values('$Fname','$Lname','$Email',$Password','$Role','$ROLEID','$faculty','$num_Courses')";
        $result=mysqli_query($conn,$sql);
      }else if($FROLE==="TA"){
        $Fname=htmlspecialchars($_POST["FName"]);
        $Lname=htmlspecialchars($_POST["LName"]);
        $Email=htmlspecialchars($_POST["Email"]);
        $Password=htmlspecialchars($_POST["Password"]);
        $Role=htmlspecialchars($_POST['FRole']);
        $ROLEID=3;
        $faculty="";
        $assigned_Doctors=[];
        $TA=new TA($Fname,$Lname,$Email,$Password,$Role,$ROLEID,$faculty,$assigned_Doctors);
        $sql="insert into TA(FName,LName,Email,Password,Role,RoleID,assigned_Doctors)
        values('$Fname','$Lname','$Email',$Password','$Role','$ROLEID','$faculty','$assigned_Doctors')";
        $result=mysqli_query($conn,$sql);
      }
    }
	// $Fname=htmlspecialchars($_POST["FName"]);
	// $Lname=htmlspecialchars($_POST["LName"]);
	// $Email=htmlspecialchars($_POST["Email"]);
	// $Password=htmlspecialchars($_POST["Password"]);
  // $Role=htmlspecialchars($_POST["Role"]);
	// $Major=htmlspecialchars($_POST["Major"]);
  //   $Minor="";
  //   $Status="Regular Student";

    $token = bin2hex(random_bytes(3));
    //insert it to database 
	// $sql="insert into students(FName,LName,Email,Password,Major,Minor,Status) 
	// values('$Fname','$Lname','$Email','$Password','$Major','$Minor','$Status')";
	// $result=mysqli_query($conn,$sql);
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