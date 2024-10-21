<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/myProfile.css">

</head>
<body>
<aside>
        <img src="img/logo.png" alt="Logo">
      <br>

        <a href="Dashboard.php">
            <img src="img/dashboard.png" alt="dashboard" class="dashboard">
            <i class="fa fa-user-o"></i> Dashboard
        </a>

        <a href="Schedule.php">
        <img src="img/myschedule.png" alt="myschedule" class="myschedule">

            <i class="fa fa-laptop"></i> Schedule
        </a>
        <a href="myProfile.php">
        <img src="img/myprofile.png" alt="myprofile" class="myprofile">

            <i class="fa fa-clone"></i> My Profile
        </a>
        <a href="attendance.php">
        <img src="img/attendance.png" alt="attendance" class="attendance">
            <i class="fa fa-star-o"></i> Attendance
        </a>
        <a href="SignOut.php">
        <img src="img/logout.png" alt="logout" class="logout">
            <i class="fa fa-trash-o"></i> Log Out
        </a>
    </aside>
    <?php
session_start();
echo "<h1>Your Profile</h1>";
echo "First Name: " .   $_SESSION["FName"]."<br>";
echo "Last Name: "  .	$_SESSION["LName"]."<br>";
echo "Email :"      .	$_SESSION["Email"]."<br>";
echo "Faculty: "    .	$_SESSION["Major"]."<br>";
echo "Minor: "      .   $_SESSION["Minor"]."<br>";
echo "Status:"      .   $_SESSION["Status"]."<br>";
echo "Semester GPA:".   $_SESSION["Sem gpa"]."<br>";
echo "CUM GPA:"     .   $_SESSION["Cum gpa"]."<br>";
echo "Semester CRDH:".   $_SESSION["Sem crdh"]."<br>";
echo "Total CRDH:"   .   $_SESSION["Total crdh"]."<br>";

echo"<a href='Home.php'>Back</a>";

?>
</body>
</html>