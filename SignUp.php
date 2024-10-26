<?php
// Include necessary files and libraries
include_once "includes/DB.inc.php";
include "classes.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Autoload PHPMailer classes via Composer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ROLE = htmlspecialchars($_POST["Role"]);
    require 'vendor/autoload.php'; 
    $token = bin2hex(random_bytes(3));

    // Set role ID based on the selected role
    $ROLEID = ($ROLE === 'Admin') ? 0 : (($ROLE === 'Student') ? 1 : 2);

    // Sanitize and store input data
    $Fname = htmlspecialchars($_POST["FName"]);
    $Lname = htmlspecialchars($_POST["LName"]);
    $Email = htmlspecialchars($_POST["Email"]);
    $Password = htmlspecialchars($_POST["Password"]);

    // Prepare and bind statements to avoid SQL injection
    if ($ROLE === "Admin") {
        $sql = "INSERT INTO admins (FName, LName, Email, Password, Role, RoleID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $Fname, $Lname, $Email, $Password, $ROLE, $ROLEID);
    } else if ($ROLE === "Student") {
        $Major = htmlspecialchars($_POST["Major"]);
        $Minor = "";
        $Status = "Regular Student";
        $sem_gpa = 0;
        $cum_gpa = 0;
        $sem_crdth = 0;
        $total_crdth = 0;

        $sql = "insert into students(FName, LName, Email, Password, Role, RoleID, Major, Minor, Status, `Sem gpa`, `Cum gpa`, `Sem crdth`, `Total crdth`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssissssiiii", $Fname, $Lname, $Email, $Password, $ROLE, $ROLEID, $Major, $Minor, $Status, $sem_gpa, $cum_gpa, $sem_crdth, $total_crdth);
    } else if ($ROLE === "Faculty Member") {
        $FROLE = htmlspecialchars($_POST['FRole']);
        $faculty = htmlspecialchars($_POST['faculty']);
        $course_code = "";

        if ($FROLE === "Doctor") {
            $sql = "insert into Doctors(FName, LName, Email, Password, Role, RoleID, faculty, course_code) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        } else if ($FROLE === "TA") {
            $sql = "insert into TA(FName, LName, Email, Password, Role, RoleID, faculty, course_code) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisss", $Fname, $Lname, $Email, $Password, $FROLE, $ROLEID, $faculty, $course_code);
    }
  }
    // Execute the statement and handle the result
//     if ($stmt->execute()) {
//       //$sendgrid = new \SendGrid('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');
//         // Send verification email using SendGrid
//         $email = new \SendGrid\Mail\Mail();
//         $email->setFrom("youssefashrafdem@gmail.com", "ASP");
//         $email->setSubject("VERIFY YOUR MAIL");
//         $email->addTo($Email, $Fname);
//         $email->addContent("text/plain", "Your code: " . $token);
//       echo $Email;
        

//         try {
//             $response = $sendgrid->send($email);
//             if ($response->statusCode() != 202) {
//                 throw new Exception('Failed to send email, status code: ' . $response->statusCode());
//             }
//         } catch (Exception $e) {
//             error_log('Caught exception: '. $e->getMessage());
//             echo 'Error sending email. Please try again later.';
//         }

//         setcookie("VCode", $token, time() + 1500); 
//         setcookie("Emailforv", $Email, time() + 1500);
//         setcookie("Fnameforv", $Fname, time() + 1500);
//         //header("Location:Varifymail.php");
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
//     $conn->close();
// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Signup Form </title>
 <!-- <link rel="stylesheet" href="css/login-signup.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    function toggleRoleOptions() {
      var role = document.getElementById('role').value;
      var majorDiv = document.getElementById('majorDiv');
      var facultyRoleDiv = document.getElementById('facultymemberrole');
      // Show Major dropdown if the role is "Student"
      majorDiv.style.display = role === 'Student' ? 'block' : 'none';
      // Show Faculty Member Role dropdown if the role is "Faculty Member"
      facultyRoleDiv.style.display = role === 'Faculty Member' ? 'block' : 'none';
    

      // if (role === 'Student') {
      //      majorDiv.style.display = 'block';
      //    } else {
      //      majorDiv.style.display = 'none';
      //    }
        }
      
       function toggleFMRoleOptions(){
        var fMR=document.getElementById('FMRole').value;
        var FMMD=document.getElementById('facultyDiv');
        FMMD.style.display = (fMR === 'Doctor' || fMR === 'TA') ? 'block' : 'none';
        
        // if(fMR==='Doctor'){
        //   FMMD.style.display = 'block';
        //  } else {
        //    FMMD.style.display = 'none';
        // }
       }
  </script>
</head>
<body>
  <div class="container">
  <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="login.jpeg" alt="">
        <div class="text">
        </div>
      </div>
      <div class="back">
        <img src="img/login.jpeg" alt="">

        <div class="text">
         
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="signup.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="FName" placeholder="Enter your first name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="LName" placeholder="Enter your last name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="Email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" placeholder="Enter your password" required>
              </div>
                <div class="input-box">
                <label>Role:</label><br>
                <div class="select-box">
                  <select name="Role" id="role" onchange="toggleRoleOptions()">
                    <option value="">Select Your Role</option>
                    <option value="Student">Student</option>
                    <option value="Faculty Member">Faculty Member</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
              </div>  

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
      <option value="Faculty Memeber Role">Faculty Memeber Role</option>
      <option value="Doctor">Doctor</option>
      <option value="TA">TA</option>
    </select><br>
      </div><br>
      <div id="facultyDiv" style="display:none;">
                <label>faculty:</label><br>
                <select name="faculty">
                  <option value="Computer Science">Computer Science</option>
                  <option value="Law">Law</option>
                  <option value="Pharmacy">Pharmacy</option>
                  <option value="Dentistry">Dentistry</option>
                  <option value="Engineering">Engineering</option>
                </select><br>
              </div>
   <br><br>

   <div class="button input-box">
                <input type="submit" value="Submit" name="Submit">
                <input type="reset">
              </div>
              <div class="text sign-up-text">Already have an account?   <label for="flip"> </label><a href="Login.php">Login now</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>












<!-- <?php
// Include necessary files and libraries
// include_once "includes/DB.inc.php";
// include "classes.php";
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// // Autoload PHPMailer classes via Composer
// require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Signup Form </title>
 <link rel="stylesheet" href="css/login-signup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    function toggleRoleOptions() {
      var role = document.getElementById('role').value;
      var majorDiv = document.getElementById('majorDiv');
      var facultyRoleDiv = document.getElementById('facultymemberrole');
      // Show Major dropdown if the role is "Student"
      majorDiv.style.display = role === 'Student' ? 'block' : 'none';
      // Show Faculty Member Role dropdown if the role is "Faculty Member"
      facultyRoleDiv.style.display = role === 'Faculty Member' ? 'block' : 'none';
    

      // if (role === 'Student') {
      //      majorDiv.style.display = 'block';
      //    } else {
      //      majorDiv.style.display = 'none';
      //    }
        }
      
       function toggleFMRoleOptions(){
        var fMR=document.getElementById('FMRole').value;
        var FMMD=document.getElementById('facultyDiv');
        FMMD.style.display = (fMR === 'Doctor' || fMR === 'TA') ? 'block' : 'none';
        
        // if(fMR==='Doctor'){
        //   FMMD.style.display = 'block';
        //  } else {
        //    FMMD.style.display = 'none';
        // }
       }
  </script>
</head>
<body>
  <div class="container">
  <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="login.jpeg" alt="">
        <div class="text">
        </div>
      </div>
      <div class="back">
        <img src="img/login.jpeg" alt="">

        <div class="text">
         
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="signup.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="FName" placeholder="Enter your first name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="LName" placeholder="Enter your last name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="Email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" placeholder="Enter your password" required>
              </div>
                <div class="input-box">
                <label>Role:</label><br>
                <div class="select-box">
                  <select name="Role" id="role" onchange="toggleRoleOptions()">
                    <option value="">Select Your Role</option>
                    <option value="Student">Student</option>
                    <option value="Faculty Member">Faculty Member</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
              </div>  

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
      <option value="Faculty Memeber Role">Faculty Memeber Role</option>
      <option value="Doctor">Doctor</option>
      <option value="TA">TA</option>
    </select><br>
      </div><br>
      <div id="facultyDiv" style="display:none;">
                <label>faculty:</label><br>
                <select name="faculty">
                  <option value="Computer Science">Computer Science</option>
                  <option value="Law">Law</option>
                  <option value="Pharmacy">Pharmacy</option>
                  <option value="Dentistry">Dentistry</option>
                  <option value="Engineering">Engineering</option>
                </select><br>
              </div>
   <br><br>

   <div class="button input-box">
                <input type="submit" value="Submit" name="Submit">
                <input type="reset">
              </div>
              <div class="text sign-up-text">Already have an account?   <label for="flip"> </label><a href="Login.php">Login now</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>
<?php
//   if($_SERVER["REQUEST_METHOD"]=="POST"){ //check if form was submitted
//     $ROLE=htmlspecialchars($_POST["Role"]);
//     require 'vendor/autoload.php'; 
//     $token = bin2hex(random_bytes(3));
//     if($ROLE==="Admin"){
//       $Fname=htmlspecialchars($_POST["FName"]);
// 	    $Lname=htmlspecialchars($_POST["LName"]);
// 	    $Email=htmlspecialchars($_POST["Email"]);
// 	    $Password=htmlspecialchars($_POST["Password"]);
//       $ROLEID=0;
//       //$Admin=new Admin($Fname,$Lname,$Email,$password,$ROLE,$ROLEID);
//       $sql="insert into admins(FName,LName,Email,Password,Role,RoleID) 
// 	    values('$Fname','$Lname','$Email','$Password','$ROLE',$ROLEID)";
// 	    $result=mysqli_query($conn,$sql);
//       if($result)	{
        
        

// $email = new \SendGrid\Mail\Mail(); 
// $email->setFrom("youssefashrafdem@gmail.com", "ASP");
// $email->setSubject("VERIFY YOUR MAIL");
// $email->addTo($Email, $Fname);
// $email->addContent("text/plain", "Your code: " . $token);

// $sendgrid = new \SendGrid('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');

// try {
//     $response = $sendgrid->send($email);
    // print $response->statusCode() . "\n";
    // print_r($response->headers());
    // print $response->body() . "\n";
    
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }

//     }
//     }else if($ROLE==="Student"){
//       $Fname=htmlspecialchars($_POST["FName"]);
// 	    $Lname=htmlspecialchars($_POST["LName"]);
// 	    $Email=htmlspecialchars($_POST["Email"]);
// 	    $Password=htmlspecialchars($_POST["Password"]);
//       $Role=htmlspecialchars($_POST["Role"]);
// 	    $Major=htmlspecialchars($_POST["Major"]);
//       $Minor="";
//       $Status="Regular Student";
//       $ROLEID=1;
//       $sem_gpa=0;
//       $cum_gpa=0;
//       $sem_crdth=0;
//       $total_crdth=0;
//       //$Student=new Student($Fname,$Lname,$Email,$Password,$Role,$ROLEID,$Major,$Minor,$Status);
// 	    $sql="insert into students(FName,LName,Email,Password,Role,RoleID,Major,Minor,Status,`Sem gpa`,`Cum gpa`,`Sem crdth`,`Total crdth`) 
// 	    values('$Fname','$Lname','$Email','$Password','$Role','$ROLEID','$Major','$Minor','$Status','$sem_gpa','$cum_gpa','$sem_crdth','$total_crdth')";
// 	    $result=mysqli_query($conn,$sql);
//       if($result)	{

// $email = new \SendGrid\Mail\Mail(); 
// $email->setFrom("youssefashrafdem@gmail.com", "ASP");
// $email->setSubject("VERIFY YOUR MAIL");
// $email->addTo($Email, $Fname);
// $email->addContent("text/plain", "Your code: " . $token);

// $sendgrid = new \SendGrid('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');

// try {
//   $response = $sendgrid->send($email);
//   if ($response->statusCode() != 202) {
//       throw new Exception('Failed to send email, status code: ' . $response->statusCode());
//   }
// } catch (Exception $e) {
//   error_log('Caught exception: '. $e->getMessage());
//   echo 'Error sending email. Please try again later.';
// }



  //   }else if($ROLE==="Faculty Member"){
  //     $FROLE=htmlspecialchars($_POST['FRole']);
  //     if($FROLE==="Doctor"){
  //       $Fname=htmlspecialchars($_POST["FName"]);
  //       $Lname=htmlspecialchars($_POST["LName"]);
  //       $Email=htmlspecialchars($_POST["Email"]);
  //       $Password=htmlspecialchars($_POST["Password"]);
  //       $Role=htmlspecialchars($_POST['FRole']);
  //       $ROLEID=2;
  //       $faculty="";
  //       $course_code="";
  //       //$Doctor=new Doctor($Fname,$Lname,$Email,$Password,$Role,$ROLEID,$faculty,$course_code);
  //       $sql="insert into Doctors(FName,LName,Email,Password,Role,RoleID,faculty,course_code)
  //       values('$Fname','$Lname','$Email','$Password','$Role','$ROLEID','$faculty','$course_code')";
  //       $result=mysqli_query($conn,$sql);
  //       if($result)	{
  
  // $email = new \SendGrid\Mail\Mail(); 
  // $email->setFrom("youssefashrafdem@gmail.com", "ASP");
  // $email->setSubject("VERIFY YOUR MAIL");
  // $email->addTo($Email, $Fname);
  // $email->addContent("text/plain", "Your code: " . $token);
  
  // $sendgrid = new \SendGrid('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');
  
  // try {
  //     $response = $sendgrid->send($email);
  //     // print $response->statusCode() . "\n";
  //     // print_r($response->headers());
  //     // print $response->body() . "\n";
      
  // } catch (Exception $e) {
  //     echo 'Caught exception: '. $e->getMessage() ."\n";
  // }
  
// }
//       }else if($FROLE==="TA"){
//         $Fname=htmlspecialchars($_POST["FName"]);
//         $Lname=htmlspecialchars($_POST["LName"]);
//         $Email=htmlspecialchars($_POST["Email"]);
//         $Password=htmlspecialchars($_POST["Password"]);
//         $Role=htmlspecialchars($_POST['FRole']);
//         $ROLEID=3;
//         $faculty="";
//         $course_code="";
        //$TA=new TA($Fname,$Lname,$Email,$Password,$Role,$ROLEID,$faculty,$assigned_Doctors);
  //       $sql="insert into TA(FName,LName,Email,Password,Role,RoleID,faculty,course_code)
  //       values('$Fname','$Lname','$Email','$Password','$Role','$ROLEID','$faculty','$course_code')";
  //       $result=mysqli_query($conn,$sql);
  //       if($result)	{
  
  // $email = new \SendGrid\Mail\Mail(); 
  // $email->setFrom("youssefashrafdem@gmail.com", "ASP");
  // $email->setSubject("VERIFY YOUR MAIL");
  // $email->addTo($Email, $Fname);
  // $email->addContent("text/plain", "Your code: " . $token);
  
  // $sendgrid = new \SendGrid('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');
  
  // try {
  //     $response = $sendgrid->send($email);
      // print $response->statusCode() . "\n";
      // print_r($response->headers());
      // print $response->body() . "\n";
      
  // } catch (Exception $e) {
  //     echo 'Caught exception: '. $e->getMessage() ."\n";
  // } 

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
          
//       }
//     // 	header("Location:Home.php");
//     // }
//       }
//     }
//   }
//   setcookie("VCode", $token, time() + 1500); 
//   setcookie("Emailforv",$Email,time()+1500);
//   setcookie("Fnameforv",$Fname,time()+1500);
//   header("Location:Varifymail.php");
// }
	// $Fname=htmlspecialchars($_POST["FName"]);
	// $Lname=htmlspecialchars($_POST["LName"]);
	// $Email=htmlspecialchars($_POST["Email"]);
	// $Password=htmlspecialchars($_POST["Password"]);
  // $Role=htmlspecialchars($_POST["Role"]);
	// $Major=htmlspecialchars($_POST["Major"]);
  //   $Minor="";
  //   $Status="Regular Student";

   
    //insert it to database 
	// $sql="insert into students(FName,LName,Email,Password,Major,Minor,Status) 
	// values('$Fname','$Lname','$Email','$Password','$Major','$Minor','$Status')";
	// $result=mysqli_query($conn,$sql);
  //$ID="Select ID from students where Email ='$Email' and password='$Password'";
    //redirect the user back to index.php 
// ?>

 //    </body>
// </html> --> 
