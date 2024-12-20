<?php
session_start();
include_once "includes/DB.inc.php";

// Fetch the user's first name and last name from the database (if needed)
$userFirstName = $_SESSION['FName'];
$userLastName = $_SESSION['LName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/dashboard_student.css">
</head>
<body class="gradient-clipped-background">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <nav class="navbar" role="navigation">
            <div class="navbar-header">
                <!-- Logo in the top left corner -->
                <img src="logo.png" class="logo">
                <h1>On Campus</h1>
            </div>
            <ul class="navbar-nav">
                <li><a href="dashboard_student.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="Schedule.php"><i class="fa fa-calendar"></i> Schedule</a></li>
                <li><a href="myProfile_student.php"><i class="fa fa-user"></i> My Profile</a></li>
                <li><a href="SignOut.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
        </nav>
    </div>

    <!-- Toggle Button -->
    <input class="label-check" id="label-check" type="checkbox">
    <label for="label-check" class="hamburger-label" id="toggleButton">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </label>

    <!-- Dashboard Content -->
    <div class="dashboard">
        <header>
            <!-- Welcome Box with Grey Background -->
            <div class="welcome-box">
                <h1>Welcome <?php echo $userFirstName . " " . $userLastName; ?></h1>
                <p>Your personalized student dashboard</p>
            </div>
            
            <!-- AI Companion Box -->
            <div class="ai-companion-box">
                <h2>X.SERA: Your AI Companion</h2>
                <p>Give AI a try and enjoy the future of learning!</p>
            </div>
        </header>

        <div class="dashboard-content">
            <!-- Main Categories Section -->
            <div class="main-categories">
                <div class="category-box">
                    <h3>Courses</h3>

                </div>
                <div class="category-box">
                    <h3>Attendance</h3>

                </div>
                <div class="category-box">
                    <h3>Grades</h3>

                </div>
                <div class="category-box">
                    <h3>Schedule</h3>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Sidebar toggle function
        document.querySelector('.label-check').addEventListener('change', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('toggleButton');
            
            sidebar.classList.toggle('sidebar-hidden');

            // Move the toggle button when sidebar is hidden or shown
            if (sidebar.classList.contains('sidebar-hidden')) {
                toggleButton.style.left = '20px';
            } else {
                toggleButton.style.left = '210px';
            }
        });
    </script>
</body>
</html>
