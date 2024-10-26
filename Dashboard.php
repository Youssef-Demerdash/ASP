<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/dashboard.css">

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
    <div class="dashboard">
        <header class="dashboard-header">
            <h1>Doctor's Dashboard</h1>
            <p>Welcome, Dr. [Name]</p>
        </header>
        
        <div class="dashboard-content">
            <!-- Timeline Section -->
            <section class="timeline">
                <h2>Timeline</h2>
                <ul class="timeline-list">
                    <li>
                        <h3>Upcoming Lecture</h3>
                        <p>Date: October 30, 2024</p>
                        <p>Topic: Introduction to Medical Sciences</p>
                    </li>
                    <li>
                        <h3>Research Meeting</h3>
                        <p>Date: November 5, 2024</p>
                        <p>Topic: Clinical Trials in Cardiology</p>
                    </li>
                    <!-- Add more timeline items here -->
                </ul>
            </section>

            <!-- Calendar Section -->
            <section class="calendar">
                <h2>Calendar</h2>
                <div class="calendar-container">
                    <iframe src="https://calendar.google.com/calendar/embed?src=[YOUR_CALENDAR_LINK]&ctz=America%2FNew_York"
                        style="border: 0" width="100%" height="500" frameborder="0" scrolling="no">
                    </iframe>
                </div>
            </section>
        </div>
    </div>
</body>
</html>

