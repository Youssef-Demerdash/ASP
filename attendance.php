<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/attendance.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Include Sidebar -->
            <?php include 'sidebar.php'; ?>

            <!-- Main Content -->
            <main class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <header class="dashboard-header my-4">
                    <h1>Attendance Management</h1>
                    <p>Select a class to mark attendance for students.</p>
                </header>
                
                <!-- Class Selection -->
                <div class="form-group">
                    <label for="class_name">Select Class:</label>
                    <select name="class_name" id="class_name" class="form-control">
                        <option value="">-- Select a Class --</option>
                        <option value="class1">Class 1</option>
                        <option value="class2">Class 2</option>
                        <option value="class3">Class 3</option>
                    </select>
                </div>

                <!-- Student List for Attendance -->
                <form id="attendanceForm" action="attendance.php" method="POST" class="mb-4">
                    <!-- Class 1 Students -->
                    <div id="class1_students" class="student-list d-none">
                        <h2>Class 1 - Mark Attendance</h2>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="attendance[student1]" value="present">
                            <label class="form-check-label">Student 1</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="attendance[student2]" value="present">
                            <label class="form-check-label">Student 2</label>
                        </div>
                    </div>

                    <!-- Class 2 Students -->
                    <div id="class2_students" class="student-list d-none">
                        <h2>Class 2 - Mark Attendance</h2>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="attendance[student3]" value="present">
                            <label class="form-check-label">Student 3</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="attendance[student4]" value="present">
                            <label class="form-check-label">Student 4</label>
                        </div>
                    </div>

                    <!-- Class 3 Students -->
                    <div id="class3_students" class="student-list d-none">
                        <h2>Class 3 - Mark Attendance</h2>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="attendance[student5]" value="present">
                            <label class="form-check-label">Student 5</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="attendance[student6]" value="present">
                            <label class="form-check-label">Student 6</label>
                        </div>
                    </div>

                    <button type="submit" name="submit_attendance" class="btn btn-primary mt-3">Submit Attendance</button>
                </form>
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
