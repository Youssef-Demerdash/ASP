<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/dashboard_student.css">
    <link rel="stylesheet" href="css/dmyProfile_student.css">

</head>
<body>
    <aside>
        <img src="img/logo.png" alt="Logo" width="90%">
        <br>
        <a href="Dashboard.php">
            <img src="img/dashboard.png" alt="dashboard" class="dashboard">
            <i class="fa fa-user-o"></i> Dashboard
        </a>
        <a href="Schedule.php">
            <img src="img/clock.png" alt="myschedule" class="myschedule">
            <i class="fa fa-laptop"></i> Schedule
        </a>
        <a href="myProfile_student.php">
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

        <section class="profile-section">
            <h1>My Profile</h1>
            <form action="updateProfile.php" method="POST" class="profile-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>

                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" value="<?php echo $student['student_id']; ?>" readonly>

                <label for="major">Major:</label>
                <input type="text" id="major" name="major" value="<?php echo $student['major']; ?>" required>

                <button type="submit">Save Changes</button>
            </form>
        </section>
</body>
</html>
