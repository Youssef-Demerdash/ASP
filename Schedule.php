<?php 
$currentPage = 'schedule'; // Add a variable to identify the active page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard_dr.css"> <!-- Existing dashboard CSS -->
    <link rel="stylesheet" href="css/schedule.css"> <!-- New Schedule CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<aside>
        <img src="img/logo.png" alt="Logo" width="90%">
      <br>

            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <header class="dashboard-header">
                    <h1>Weekly Course Schedule</h1>
                    <p>Manage your lectures and office hours efficiently.</p>
                </header>

<<<<<<< HEAD
                <div class="schedule-content">
                    <table class="schedule-table table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8:00 AM - 9:00 AM</td>
                                <td>Data Structures</td>
                                <td>Introduction to Programming</td>
                                <td>Data Structures</td>
                                <td>Operating Systems</td>
                                <td>Software Engineering</td>
                            </tr>
                            <tr>
                                <td>9:15 AM - 10:15 AM</td>
                                <td>Machine Learning</td>
                                <td>Web Development</td>
                                <td>Machine Learning</td>
                                <td>Database Systems</td>
                                <td>Artificial Intelligence</td>
                            </tr>
                            <tr>
                                <td>10:30 AM - 11:30 AM</td>
                                <td>Computer Networks</td>
                                <td>Cybersecurity</td>
                                <td>Computer Networks</td>
                                <td>Human-Computer Interaction</td>
                                <td>Mobile App Development</td>
                            </tr>
                            <tr>
                                <td>11:45 AM - 12:45 PM</td>
                                <td>Discrete Mathematics</td>
                                <td>Cloud Computing</td>
                                <td>Discrete Mathematics</td>
                                <td>Software Testing</td>
                                <td>Consultation</td>
                            </tr>
                            <tr>
                                <td>1:00 PM - 2:00 PM</td>
                                <td colspan="5">Lunch Break</td>
                            </tr>
                            <tr>
                                <td>2:00 PM - 3:00 PM</td>
                                <td>Office Hours</td>
                                <td>Office Hours</td>
                                <td>Office Hours</td>
                                <td>Office Hours</td>
                                <td>Office Hours</td>
                            </tr>
                            <tr>
                                <td>3:15 PM - 4:15 PM</td>
                                <td>Capstone Project</td>
                                <td>Software Development</td>
                                <td>Capstone Project</td>
                                <td>Networking Lab</td>
                                <td>Data Science</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
=======
        <a href="Schedule.php">
        <img src="img/clock.png" alt="myschedule" class="myschedule">

            <i class="fa fa-laptop"></i> Schedule
        </a>
        <a href="myProfile.php">
        <img src="img/myprofile.png" alt="myprofile" class="myprofile">

            <i class="fa fa-clone"></i> My Profile
        </a>

        <a href="SignOut.php">
        <img src="img/logout.png" alt="logout" class="logout">
            <i class="fa fa-trash-o"></i> Log Out
        </a>
    </aside>
>>>>>>> 3fbfe76f8c57f567f75099d0e40e0dada37a875d
</body>
</html>
