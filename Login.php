<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/login-signup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="login-form">
          <div class="title">Welcome Please Login</div>
          <form action="#"></form>
          <!-- Form action now points to the same file, so PHP can handle form submission -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="Email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="Submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip"><a href="SignUp.php">Sign up now</a></label></div>

            </div>
          </form>

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
        </div>
      </div>
    </div>
  </div>
</body>
</html>
