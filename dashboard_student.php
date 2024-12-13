<?php
session_start();
include_once "includes/DB.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #39464e;
        }

        /* Sidebar styling */
        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f5f7f9;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            padding-top: 50px;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-hidden {
            transform: translateX(-100%);
        }

        /* Sidebar content styling */
        .navbar {
            padding: 0;
        }

        .navbar-header {
            padding: 20px;
            background-color: #fff;
            border-bottom: 1px solid #e7e7e7;
        }

        /* Toggle button styling */
        .label-check {
            display: none;
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
        }

        .navbar-nav li a {
            display: block;
            color: #5f5f5f;
            padding: 15px 25px;
            font-size: 15px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-nav li a:hover,
        .navbar-nav li.active a {
            background-color: #e0e0e0;
            color: #007bff;
        }

        .hamburger-label {
            width: 70px;
            height: 58px;
            position: absolute;
            top: 20px;
            left: 210px;
            cursor: pointer;
            z-index: 1001;
            transition: left 0.3s ease; /* Smooth transition for the button position */
        }


        .navbar-brand {
            color: #39464e;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
        }

        /* Move the button to the left when sidebar is hidden */
        .sidebar-hidden + .hamburger-label {
            left: 20px;
        }

        .hamburger-label div {
            width: 70px;
            height: 6px;
            background-color: #39464e;
            position: absolute;
            transition: all 0.3s ease;
        }

        .line1 { top: 10px; }
        .line2 { top: 24px; }
        .line3 { top: 38px; }

        /* Rotate lines on sidebar toggle */
        #label-check:checked + .hamburger-label .line1 {
            transform: rotate(28deg) scaleX(0.55) translate(39px, -4.5px);
            border-radius: 50px 50px 50px 0;
        }
        #label-check:checked + .hamburger-label .line3 {
            transform: rotate(-28deg) scaleX(0.55) translate(39px, 4.5px);
            border-radius: 0 50px 50px 50px;
        }
        #label-check:checked + .hamburger-label .line2 {
            width: 45px;
            border-radius: 25px;
        }

        /* Dashboard styling */
        .dashboard {
            flex: 1;
            margin-left: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <nav class="navbar" role="navigation">
            <div class="navbar-header">
                <h1>On Campus</h1>
            </div>
            <ul class="navbar-nav">
                <li><a href="Schedule.php"><i class="fa fa-dashboard"></i> Schedule</a></li>
                <li><a href="myProfile_student.php"><i class="fa fa-puzzle-piece"></i> My Profile</a></li>
                <li><a href="SignOut.php"><i class="fa fa-heart"></i> Log Out</a></li>
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
            <h1>Student's Dashboard</h1>
            <h2>Welcome <?php echo $_SESSION['FName']." ".$_SESSION['LName']; ?></h2>
        </header>
        <div class="dashboard-content">
            <!-- Content goes here -->
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