<?php
<<<<<<< HEAD
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
=======
session_start();
include_once "includes/DB.inc.php";
// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
//     $Email = $_POST["Email"];
//     $Password = $_POST["Password"];

//     // Secure login with prepared statements
//     if ($_POST['action'] === 'login') {
//         $stmt = $conn->prepare("SELECT * FROM students WHERE Email = ? AND Password = ?");
//         $stmt->bind_param("ss", $Email, $Password);
//         $stmt->execute();
//         $result = $stmt->get_result();
>>>>>>> 3fbfe76f8c57f567f75099d0e40e0dada37a875d

//         if ($row = $result->fetch_assoc()) {
//             $_SESSION = array_merge($_SESSION, $row);  // Store user details in session
//             header("Location: Dashboard.php?login=success");
//             exit();
//         } else {
//             $loginError = "Invalid Email or Password";
//         }
//         $stmt->close();
//     }
//     // Registration Logic Here (Signup)
// }

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
  $Email = $_POST["Email"];
  $Password = $_POST["Password"];

  // Secure login with prepared statements
  if ($_POST['action'] === 'login') {
      $stmt = $conn->prepare("SELECT * FROM students WHERE Email = ?");
      $stmt->bind_param("s", $Email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($row = $result->fetch_assoc()) {
          // Verify the hashed password
          if (password_verify($Password, $row['Password'])) {
              $_SESSION = array_merge($_SESSION, $row);  // Store user details in session
              header("Location: Dashboard.php?login=success");
              exit();
          } else {
              $loginError = "Invalid Email or Password";
          }
<<<<<<< HEAD
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
              <div class="text"><a href="forget-password.php">Forgot password?</a></div>
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
=======
      } else {
          $loginError = "Invalid Email or Password";
      }
      $stmt->close();
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Welcome to OnCampus. Log in to access your account." />
    <meta name="keywords" content="welcome, login, platform, student services" />
    <title>Welcome to OnCampus</title>

    <link rel="stylesheet" href="css/Login.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-400 to-blue-600 min-h-[80vh] flex flex-col justify-center py-8">

<!-- Blurred Login Form Overlay -->
<div class="login-form-container">
    <div class="login-form">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="email" name="Email" placeholder="Enter your email" required>
            <input type="password" name="Password" placeholder="Enter your password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</div>

<!-- Main Content -->

    <div class="flex flex-col items-center mb-6 text-center">
        <img src="img/logo.png" alt="Company Logo" class="w-24 mb-2" />
        <h1 class="text-3xl md:text-4xl text-white font-bold">Welcome to OnCampus</h1>
        <p class="text-md md:text-lg text-white mt-1">Your one-stop platform for academic success.</p>

        <div class="w-full md:w-3/5 py-4 text-center">
            <img class="w-full md:w-4/5 z-50" src="img/hero.png" alt="Hero Image" />
        </div>
    </div>

    <!-- Other content here -->

</body>
</html>






















<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Welcome to OnCampus. Log in to access your account." />
    <meta name="keywords" content="welcome, login, platform, student services" />
    <title>Welcome to OnCampus</title>
    
    <link rel="stylesheet" href="css/login-signup.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-400 to-blue-600 min-h-[80vh] flex flex-col justify-center py-8">
<br><br>
    <div class="flex flex-col items-center mb-6 text-center">
        <br><br>
        <img src="img/logo.png" alt="Company Logo" class="w-24 mb-2" />
        <h1 class="text-3xl md:text-4xl text-white font-bold">Welcome to OnCampus</h1>
        <p class="text-md md:text-lg text-white mt-1">Your one-stop platform for academic success.</p>
    </div>

    <div class="container mx-auto flex flex-wrap flex-col md:flex-row items-center justify-center mb-6">
       
        <div class="w-full md:w-3/5 py-4 text-center">
            <img class="w-full md:w-4/5 z-50" src="img/hero.png" alt="Hero Image" />
        </div>
    </div>
    
      <div class="wave-section mt-6">
        <svg viewBox="0 0 1428 174" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.1"></path>
            <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.1"></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.2"></path>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
            </g>
        </svg>
    </div>
    
</body>
</html> -->
    <!-- <script>
        function toggleRoleOptions() {
            var role = document.getElementById('role').value;
            document.getElementById('majorDiv').style.display = (role === 'Student') ? 'block' : 'none';
            document.getElementById('facultyRoleDiv').style.display = (role === 'Faculty Member') ? 'block' : 'none';
        }

        function validateForm(form) {
            let emptyFields = [];
            if (!form.Email.value) emptyFields.push("Email");
            if (!form.Password.value) emptyFields.push("Password");

            if (form.id === "signupForm") {
                if (!form.Name.value) emptyFields.push("Name");
                if (form.Email.value && !form.Email.value.includes('@')) {
                    alert("Please enter a valid email address with an @ symbol.");
                    return false;
                }
            }

            if (emptyFields.length > 0) {
                alert("Please fill in the following fields: " + emptyFields.join(", "));
                return false;
            }
            return true;
        }
    </script> -->
<!-- </head>
<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="img/login.jpeg" alt="">
            </div>
            <div class="back">
                <img src="img/login.jpeg" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login Form</div>
                    <form action="" id="loginForm" method="post" onsubmit="return validateForm(this)">
                        <input type="hidden" name="action" value="login">
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://accounts.google.com/" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="Email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="Password" placeholder="Enter your password" required>
                        </div>
                        <div class="text"><a href="forget-password.php">Forgot password?</a></div>
                        <div class="button input-box">
                            <input type="submit" value="Submit">
                        </div>
                        <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
                        <?php if (isset($loginError)) echo "<div style='color:red;'>$loginError</div>"; ?>
                    </form>
                </div>
                
                <div class="signup-form">
                    <div class="title">Sign up Form</div>
                    <form action="" id="signupForm" method="post" onsubmit="return validateForm(this)">
                        <input type="hidden" name="action" value="signup">
                        <div class="input-box">
                            <i class="fas fa-user"></i>
                            <input type="text" name="Name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="Email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="Password" placeholder="Enter your password" required>
                        </div>
                        <div class="input-box">
                            <label>Role: </label>
                            <select name="Role" id="role" onchange="toggleRoleOptions()" required>
                                <option value="">Select Your Role</option>
                                <option value="Student">Student</option>
                                <option value="Faculty Member">Faculty Member</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div id="majorDiv" style="display:none;">
                            <label>Major: </label>
                            <select name="Major">
                                <option value="Computer Science">Computer Science</option>
                                <option value="Alsun">Alsun</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Dentistry">Dentistry</option>
                                <option value="Engineering">Engineering</option>
                            </select>
                        </div>
                        <div id="facultyRoleDiv" style="display:none;">
                            <label>Faculty Role: </label>
                            <select name="FRole">
                                <option value="Doctor">Doctor</option>
                                <option value="TA">TA</option>
                            </select>
                        </div>
                        <div class="button input-box">
                            <input type="submit" value="Submit">
                        </div>
                        <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> -->
>>>>>>> 3fbfe76f8c57f567f75099d0e40e0dada37a875d
