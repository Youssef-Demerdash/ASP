<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/attendance.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<?php include 'sidebar_student.php'; ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Include Sidebar -->

            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <header class="dashboard-header my-4">
                    <h1>Attendance </h1>
                    <p>Select a course to view your attendance.</p>
                </header>
                
                <!-- Class Selection -->
                <div class="form-group">
                    <label for="class_name">Select Course:</label>
                    <select name="class_name" id="class_name" class="form-control">
                        <option value="">-- Select a Course --</option>
                        <option value="class1">Class 1</option>
                        <option value="class2">Class 2</option>
                        <option value="class3">Class 3</option>
                    </select>
                </div>

            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#class_name').on('change', function() {
                $('.student-list').addClass('d-none'); // Hide all student lists
                const selectedClass = $(this).val();
                if (selectedClass) {
                    $('#' + selectedClass + '_students').removeClass('d-none'); // Show selected class's students
                }
            });

            // Confirm attendance submission
            $('#attendanceForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form from submitting immediately
                if (confirm("Are you sure you want to submit this attendance?")) {
                    this.submit(); // Submit form after confirmation
                    alert("Attendance submitted successfully!"); // Show success message
                }
            });
        });
    </script>
</body>
</html>
