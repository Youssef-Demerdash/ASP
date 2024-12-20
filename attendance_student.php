<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS (optional) -->
    <link rel="stylesheet" href="css/attendance.css">
    <!-- Font Awesome (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<?php include 'sidebar_student.php'; ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar is included via sidebar_student.php -->

            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <header class="dashboard-header my-4">
                    <h1>Attendance</h1>
                    <p>Select a course to view your attendance.</p>
                </header>
                
                <!-- Course Selection Form -->
                <div class="form-group">
                    <label for="course_select">Select Course:</label>
                    <select name="course_select" id="course_select" class="form-control">
                        <option value="">-- Select a Course --</option>
                        <?php
                        // Fetch courses the student is enrolled in
                        $stmt = $pdo->prepare("
                            SELECT c.ID, c.course_code, c.course_name
                            FROM courses c
                            INNER JOIN enrollments e ON c.ID = e.course_id
                            WHERE e.student_id = ?
                            ORDER BY c.course_code ASC
                        ");
                        $stmt->execute([$student_id]);
                        $courses = $stmt->fetchAll();

                        foreach ($courses as $course) {
                            echo "<option value=\"{$course['ID']}\">{$course['course_code']} - {$course['course_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Attendance Table -->
                <div id="attendance_table" class="mt-4">
                    <!-- Attendance records will be loaded here via AJAX -->
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
    $(document).ready(function(){
        $('#course_select').change(function(){
            var course_id = $(this).val();
            if(course_id){
                $.ajax({
                    type: 'POST',
                    url: 'fetch_attendance.php',
                    data: {course_id: course_id},
                    success: function(response){
                        $('#attendance_table').html(response);
                    },
                    error: function(){
                        $('#attendance_table').html('<div class="alert alert-danger">An error occurred while fetching attendance.</div>');
                    }
                });
            } else {
                $('#attendance_table').html('');
            }
        });
    });
    </script>
</body>
</html>

<?php
// attendance.php

session_start();

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$student_id = $_SESSION['student_id'];

// Database configuration
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_database_user';
$pass = 'your_database_password';
$charset = 'utf8mb4';

// Set up DSN and create PDO instance
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Enable exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Disable emulation
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
