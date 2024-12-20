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
