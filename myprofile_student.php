<?php
session_start();
include_once "includes/DB.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/dashboard_student.css">
    <link rel="stylesheet" href="css/myProfile_student.css">

    <style>

        .body {
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
            left: 15px;
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
<?php include 'sidebar_student.php'; ?>

<body>


<!-- Toggle Button -->
<input class="label-check" id="label-check" type="checkbox">
<label for="label-check" class="hamburger-label" id="toggleButton">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
</label>

<div class="container">
    <section class="profile-section">
        <h1>My Profile</h1>
        <form action="updateProfile.php" method="POST" class="profile-form">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" value="<?php echo $_SESSION['ID']; ?>">
            </div>

            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $_SESSION['FName']; ?>">
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo $_SESSION['LName']; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['Email']; ?>">
            </div>

            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" value="<?php echo $_SESSION['Status']; ?>">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?php echo $_SESSION['Status']; ?>" >
            </div>

            <div class="form-group">
                <label for="major">Major:</label>
                <input type="text" id="major" name="major" value="<?php echo $_SESSION['Major']; ?>" >
            </div>

            <div class="form-group">
                <label for="minor">Minor:</label>
                <input type="text" id="minor" name="minor" value="<?php echo $_SESSION['Minor']; ?>" >
            </div>

            <div class="form-group">
                <label for="sem_gpa">Semester GPA:</label>
                <input type="number" id="sem_gpa" name="sem_gpa" value="<?php echo $_SESSION['Sem GPA']; ?>" >
            </div>

            <div class="form-group">
                <label for="cum_gpa">Cumulative GPA:</label>
                <input type="number" id="cum_gpa" name="cum_gpa" value="<?php echo $_SESSION['Cum GPA']; ?>" >
            </div>

            <div class="form-group">
                <label for="sem_crdth">Semester Credits:</label>
                <input type="number" id="sem_crdth" name="sem_crdth" value="<?php echo $_SESSION['Sem crdth']; ?>" >
            </div>

            <div class="form-group">
                <label for="total_crdth">Total Credits:</label>
                <input type="number" id="total_crdth" name="total_crdth" value="<?php echo $_SESSION['Total crdth']; ?>" >
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </section>
</div>

<script>
    // Sidebar toggle function
    document.querySelector('.label-check').addEventListener('change', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggleButton');
        
        sidebar.classList.toggle('sidebar-hidden');

        // Move the toggle button when sidebar is hidden or shown
        toggleButton.style.left = sidebar.classList.contains('sidebar-hidden') ? '20px' : '210px';
    });
</script>
</body>
</html>
