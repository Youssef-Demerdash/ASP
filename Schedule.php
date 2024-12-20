<?php 
$currentPage = 'schedule'; // Add a variable to identify the active page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/schedule.css"> <!-- New Schedule CSS -->
    <link rel="stylesheet" href="css/dashboard_student.css"> <!-- Student Dashboard CSS -->
   
</head>
<body class="gradient-clipped-background">
<?php include 'sidebar_student.php'; ?> 


    <!-- Toggle Button -->
    <input class="label-check" id="label-check" type="checkbox">
    <label for="label-check" class="hamburger-label" id="toggleButton">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </label>


<div class="container-fluid">
    <main class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <header class="dashboard-header">
            <h1>Weekly Course Schedule</h1>
            <p>Manage your lectures and office hours efficiently.</p>
        </header>

        
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
                        <td>9:15 AM - 10:15 AM</td>
                        <td>Data Structures</td>
                        <td>Introduction to Programming</td>
                        <td>Data Structures</td>
                        <td>Operating Systems</td>
                        <td>Software Engineering</td>
                    </tr>
                    <tr>
                        <td>10:30 AM - 11:30 AM</td>
                        <td>Machine Learning</td>
                        <td>Web Development</td>
                        <td>Machine Learning</td>
                        <td>Database Systems</td>
                        <td>Artificial Intelligence</td>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
