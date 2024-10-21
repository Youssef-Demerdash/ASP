<?php
// Include necessary files and libraries
include_once "includes/DB.inc.php";
include "classes.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Autoload PHPMailer classes via Composer
require 'vendor/autoload.php';
?>
 <?php
          // Start session and include DB connection
          session_start();
          include_once "includes/DB.inc.php";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $Email = $_POST["Email"];
              $Password = $_POST["Password"];

              // Query the database
              $sql = "SELECT * FROM students WHERE Email ='$Email' AND password='$Password'";
              $result = mysqli_query($conn, $sql);

              if ($row = mysqli_fetch_array($result)) {
                  // Set session variables on successful login
                  $_SESSION["ID"] = $row[0];
                  $_SESSION["FName"] = $row["FName"];
                  $_SESSION["LName"] = $row["LName"];
                  $_SESSION["Email"] = $row["Email"];
                  $_SESSION["Password"] = $row["Password"];
                  $_SESSION["Major"] = $row["Major"];
                  $_SESSION["Minor"] = $row["Minor"];
                  $_SESSION["Status"] = $row["Status"];
                  $_SESSION["Sem_gpa"] = $row["Sem gpa"];
                  $_SESSION["Cum_gpa"] = $row["Cum gpa"];
                  $_SESSION["Sem_crdh"] = $row["Sem crdh"];
                  $_SESSION["Total_crdh"] = $row["Total crdh"];

                  // Redirect on success
                  header("Location:Dashboard.php?login=success");
                  exit();
              } else {
                  echo "<div style='color:red; margin-top:10px;'>Invalid Email or Password</div>";
              }
          }
          ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS | CodingLab </title>
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
      if (role === 'Student') {
           majorDiv.style.display = 'block';
         } else {
           majorDiv.style.display = 'none';
         }
        }

        function validateEmail(email) {
            return email.includes('@');
        }

        function validateForm(form) {
            var emptyFields = [];
            if (!form.querySelector('input[placeholder="Enter your email"]').value) {
                emptyFields.push('Email');
            }
            if (!form.querySelector('input[placeholder="Enter your password"]').value) {
                emptyFields.push('Password');
            }
            if (form.id === "signupForm") {
                if (!form.querySelector('input[placeholder="Enter your name"]').value) {
                    emptyFields.push('Name');
                }
                if (form.querySelector('input[placeholder="Enter your email"]').value && !validateEmail(form.querySelector('input[placeholder="Enter your email"]').value)) {
                    alert('Please enter a valid email address with an @ symbol.');
                    return false;
                }
            }

            if (emptyFields.length > 0) {
                alert('Please fill in the following fields: ' + emptyFields.join(', '));
                return false;
            }
            return true;
        }

        window.onload = function () {
            document.getElementById('loginForm').onsubmit = function (event) {
                if (!validateForm(this)) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            };
            document.getElementById('signupForm').onsubmit = function (event) {
                if (!validateForm(this)) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            };
        };
    </script>

  </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="img/login.jpeg" alt="">
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
          <div class="login-form">
                <div class="title" style="font-family: 'Arial', sans-serif; font-size: 30px; font-weight: bold; color: #333;">
                  Login Form
                </div>
                <form action="#" id="loginForm" method="post">

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-boxes">
            <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://accounts.google.com/" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>

                <input type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
       
      </div>
      <div class="signup-form">
    <div class="title" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #333;">
        Sign up Form
    </div>
    <form action="#" id="signupForm" method="post">
    <div class="input-boxes">
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
                <label>Role: </label><br>
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
                <label>Major: </label>
                <div class="select-box">
                    <select name="Major">
                        <option value="Computer Science">Computer Science</option>
                        <option value="Alsun">Alsun</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Dentistry">Dentistry</option>
                        <option value="Engineering">Engineering</option>
                    </select>
                </div>
            </div>
            <div id="facultymemberrole" style="display:none;">
                <label>Faculty Member Role: </label><br>
                <div class="select-box">
                    <select name="FRole" id="FMRole" onchange="toggleFMRoleOptions()">
                        <option value="Doctor">Doctor</option>
                        <option value="TA">TA</option>
                    </select>
                </div>
            </div>
            <div class="button input-box">
                <input type="submit" value="Submit">
            </div>
            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
        </div>
    </form>
</div>

                <?php
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
    </div>
    </div>
    </div>
  </div>
</body>
</html>