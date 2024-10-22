<?php
session_start();
error_reporting(0);
include('includes/DB.inc.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $newpassword = md5($_POST['newpassword']);
    
    // Check if the user exists
    $sql = "SELECT StudentEmail FROM tblstudent WHERE StudentEmail=:email AND ContactNumber=:mobile";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    
    if ($query->rowCount() > 0) {
        // Generate verification code
        $VCode = bin2hex(random_bytes(3)); // 6 characters verification code
        setcookie("VCode", $VCode, time() + 1500); // Set cookie for 25 minutes
        setcookie("Emailforv", $email, time() + 1500);
        
        // Send verification email
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            
            $mail->Host = 'smtp.example.com';  // Set the SMTP server
            $mail->SMTPAuth = true;                                   
            $mail->Username = 'your-email@example.com';                 
            $mail->Password = 'your-email-password';                         
            $mail->SMTPSecure = 'tls';                               
            $mail->Port = 587;                                        

            //Recipients
            $mail->setFrom('your-email@example.com', 'Your Website');
            $mail->addAddress($email);     // Add the user's email

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Password Reset Verification Code';
            $mail->Body    = 'Your verification code is: ' . $VCode;

            $mail->send();
            echo "<script>alert('Verification code has been sent to your email');</script>";
            header('Location: verify_mail.php'); // Redirect to verification page
            exit();
        } catch (Exception $e) {
            echo "<script>alert('Verification email could not be sent.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or mobile number');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>Student Forgot Password</title>

    <link rel="stylesheet" href="css/forget.css">
        <script>
        function valid()
        {
        if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
        {
        alert("New Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        return true;
        }
        </script>
  </head>
  <div>
  <div class="container">

                <div class="brand-logo">
                  <img src="img/logo_Dark.jpeg"> 
                </div>
                <h4>RECOVER PASSWORD</h4>
                <h6 class="font-weight-light">Enter your email address to reset password!</h6>
                <form class="pt-3" id="login" method="post" name="login">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Email Address" required="true" name="email">
                  </div>

                  <div class="form-group">
                   
                    <input class="form-control form-control-lg" type="password" name="newpassword" placeholder="New Password" required="true"/>
                  </div>
                  <div class="form-group">
                    
                   <input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" type="button" onclick="window.location.href='Varifymail.php'">Reset</button>
                    </div>

                  <div class="mb-2">
                    <a href="welcome.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Back Home </a>
                  </div>
                  
                </form>
              </div>
</div>

  </body>
</html>