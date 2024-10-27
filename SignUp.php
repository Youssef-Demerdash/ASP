<?php
include_once "includes/DB.inc.php";
include "classes.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ROLE = htmlspecialchars($_POST["Role"]);
    $FROLE=htmlspecialchars($_POST["FRole"]);
    $Fname = htmlspecialchars($_POST["FName"]);
    $Lname = htmlspecialchars($_POST["LName"]);
    $Email = htmlspecialchars($_POST["Email"]);
    $Password = htmlspecialchars($_POST["Password"]);

    if ($ROLE === "Admin") {
        $role="Admin";
        $ROLEID=0;
        $sql = "INSERT INTO admins (FName, LName, Email, Password, Role, RoleID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $Fname, $Lname, $Email, $Password, $role, $ROLEID);
    } else if ($ROLE === "Student") {
        $Major = htmlspecialchars($_POST["Major"]);
        $Minor = "";
        $Status = "Regular Student";
        $sem_gpa = 0;
        $cum_gpa = 0;
        $sem_crdth = 0;
        $total_crdth = 0;
        $role="Student";
        $ROLEID=1;

        $sql = "INSERT INTO students(FName, LName, Email, Password, Role, RoleID, Major, Minor, Status, `Sem gpa`, `Cum gpa`, `Sem crdth`, `Total crdth`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssiiii", $Fname, $Lname, $Email, $Password, $role, $ROLEID, $Major, $Minor, $Status, $sem_gpa, $cum_gpa, $sem_crdth, $total_crdth);
    } else if ($ROLE === "Faculty Member") {
        // $FROLE = htmlspecialchars($_POST['FRole']);
        $faculty = htmlspecialchars($_POST['faculty']);
        $course_code = "";

        if ($FROLE === "Doctor") {
            $role="Doctor";
            $ROLEID=2;
            $sql = "INSERT INTO doctors(FName, LName, Email, Password, Role, RoleID, faculty, `course code`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        } else if ($FROLE === "TA") {
            $role="TA";
            $ROLEID=3;
            $sql = "INSERT INTO ta(FName, LName, Email, Password, Role, RoleID, faculty, `course code`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $Fname, $Lname, $Email, $Password, $role, $ROLEID, $faculty, $course_code);
    }
    if ($stmt->execute()) {
        header("Location:Login.php");
    }else{
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
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
    
    <link rel="stylesheet" href="css/Signup.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <script src="js/Signup.js"></script>
</head>

<body class="bg-gradient-to-r from-blue-400 to-blue-600 min-h-[80vh] flex flex-col justify-center py-8">

<!-- Blurred Login Form Overlay -->
<div class="Signup-form-container">
    <div class="Signup-form">
        <h2>SignUp</h2>
        <form action="SignUp.php" method="post">
            <input type="FName" name="FName" placeholder="Enter your First Name" required>
            <input type="LName" name="LName" placeholder="Enter your Last Name" required>
            <input type="Email" name="Email" placeholder="Enter your Email" required>
            <input type="password" name="Password" placeholder="Enter your password" required>
            <select name="Role" id="role" onchange="toggleRoleOptions()">
                    <option value="">Select Your Role</option>
                    <option value="Student">Student</option>
                    <option value="Faculty Member">Faculty Member</option>
                    <option value="Admin">Admin</option>
            </select>
            <div id="majorDiv" style="display:none;">
                <select name="Major">
                  <option value="Select Major">Select Major</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Law">Law</option>
                  <option value="Pharmacy">Pharmacy</option>
                  <option value="Dentistry">Dentistry</option>
                  <option value="Engineering">Engineering</option>
                </select><br>
              </div>
              <div id="facultymemberrole" style="display:none;">
              <select name="FRole" id="FMRole" onchange="toggleFMRoleOptions()">
                    <option value="Faculty Memeber Role">Select Faculty Role</option>
                    <option value="Doctor">Doctor</option>
                    <option value="TA">TA</option>
                </select><br>
                </div>
                <div id="facultyDiv" style="display:none;">
                <select name="faculty">
                  <option value="faculty">Select Faculty</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Law">Law</option>
                  <option value="Pharmacy">Pharmacy</option>
                  <option value="Dentistry">Dentistry</option>
                  <option value="Engineering">Engineering</option>
                </select><br>
              </div>

            <input type="submit" value="SignUp">
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
