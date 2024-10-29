<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
    <link rel="stylesheet" href="css/dashboard_dr.css">
    <link rel="stylesheet" href="css/sidebar.css"> <!-- Sidebar CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
