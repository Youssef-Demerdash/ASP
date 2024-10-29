<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/dashboard_student.css">
    <link rel="stylesheet" href="css/myProfile_student.css">

</head>
<body>
    <aside>
        <img src="img/logo.png" alt="Logo" width="90%">
        <br>
        <nav>
            <a href="Dashboard.php">
                <img src="img/dashboard.png" alt="Dashboard" class="dashboard">
                <i class="fa fa-user-o"></i> Dashboard
            </a>
            <a href="Schedule.php">
                <img src="img/clock.png" alt="My Schedule" class="myschedule">
                <i class="fa fa-laptop"></i> Schedule
            </a>
            <a href="myProfile_student.php">
                <img src="img/myprofile.png" alt="My Profile" class="myprofile">
                <i class="fa fa-clone"></i> My Profile
            </a>
            <a href="attendance.php">
                <img src="img/attendance.png" alt="Attendance" class="attendance">
                <i class="fa fa-star-o"></i> Attendance
            </a>
            <a href="SignOut.php">
                <img src="img/logout.png" alt="Log Out" class="logout">
                <i class="fa fa-trash-o"></i> Log Out
            </a>
        </nav>
    </aside>

    <div class="container"> <!-- Flex container for aside and section -->
        <section class="profile-section">
            <h1>My Profile</h1>
            <form action="updateProfile.php" method="POST" class="profile-form">
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id" value="<?php echo $student['ID']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" value="<?php echo $student['FName']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" value="<?php echo $student['LName']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $student['Email']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" required>
                </div>

                <div class="form-group">
                    <label for="major">Major:</label>
                    <input type="text" id="major" name="major" value="<?php echo $student['major']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" id="status" name="status" value="<?php echo $student['Status']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="sem_gpa">Semester GPA:</label>
                    <input type="number" id="sem_gpa" name="sem_gpa" value="<?php echo $student['Sem gpa']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="cum_gpa">Cumulative GPA:</label>
                    <input type="number" id="cum_gpa" name="cum_gpa" value="<?php echo $student['CUM gpa']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="sem_crdth">Semester Credits:</label>
                    <input type="number" id="sem_crdth" name="sem_crdth" value="<?php echo $student['Sem crdth']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="total_crdth">Total Credits:</label>
                    <input type="number" id="total_crdth" name="total_crdth" value="<?php echo $student['Total crdth']; ?>" readonly>
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </section>
    </div>
</body>
</html>
